<?php

namespace App\Http\Controllers\Custom;

use App\Http\Controllers\Controller;
use App\Models\employee;
use Illuminate\Http\Request;
use App\Models\admin;
use App\Models\Freelancer;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;
use Illuminate\Support\Facades\Hash;

class CustomController extends Controller
{

    function login(Request $request){
        //Request Value from Input Form
        $data = $request->validate([
            'email'      => 'required|email',
            'password'   => 'required|min:8|string',
        ]);

        $email = $data['email'];
        $password = $data['password'];

        //Check if User Exists
        if(User::where('USER_EMAIL', $email)->exists()){
            //retrieving users information
            $user = User::where(['USER_EMAIL'=>$email])->first();
            //check if password matches else redirect to login page
            if(Hash::check($password,$user['USER_PASSWORD'])){
                //checking account status (if 1 = active else account is frozen)
                if($user['ACCOUNT_STATUS'] == 1){
                    //putting user information in a session variable
                    request()->Session()->put('user',$user);
                    //if user's role is 2 means he is a freelancer
                    if($user['USER_ROLE']==2){
                        //retrieve information about freelancer and putting in a session variable
                        $freelancer = Freelancer::where('USER_ID', $user['USER_ID'])->get();
                        $freelancer = json_decode(json_encode($freelancer[0]), true);
                        request()->Session()->put('freelancer',$freelancer);
                    }
                    //if user's role is 3 means he is an employee
                    if($user['USER_ROLE']==3){
                        //retrieve information about employee and putting in a session variable
                        $employee = employee::where('USER_ID', $user['USER_ID'])->get();
                        $employee = json_decode(json_encode($employee[0]), true);
                        request()->Session()->put('employee',$employee);
                        //redirect to employee dashboard
                        return view('admin.Employee.dashboard');
                    }
                    return redirect()->route('index');
                }else{
                    return view('login_user')->with('no_user',"Wrong Login Credentials or Check if you are allowed to login");
                }
            }
        //check if admin exists
        }elseif(admin::where('ADMIN_EMAIL', $email)->exists()){
            //retrieve information about admin with same email
            $adminDetails = admin::where('ADMIN_EMAIL', $email)->first();
            //check if password is the same
            if(Hash::check($password,$adminDetails['ADMIN_PASSWORD'])){
                // if status = 1 means that admin account is active
                if( $adminDetails['ADMIN_STATUS'] == 1){
                  //REDIRECT TO ADMIN DASHBOARD
                  $request->Session()->put('adminDetails',$adminDetails);
                  return redirect('admin.dashboard');
                }
            }
        }

        return view('login_user')->with('no_user',"Wrong Login Credentials or Check if you are allowed to login");

    }


}
