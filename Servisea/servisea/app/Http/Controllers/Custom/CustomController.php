<?php

namespace App\Http\Controllers\Custom;

use App\Http\Controllers\Controller;
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
    //REQUEST INPUT FROM FORM
    $data = $request->validate([
        'email'      => 'required|email',
        'password'   => 'required|min:8|string',
   ]);

    $email = $data['email'];
    $password = $data['password'];

    //CHECK IF USER EXIST

    if(User::where('USER_EMAIL', $email)->exists()){

     $user = User::where('USER_EMAIL', $email)->first();

        if(Hash::check($password,$user['USER_PASSWORD'])){
            if($user['ACCOUNT_STATUS'] == 1){
                request()->Session()->put('user',$user);

                if($user['USER_ROLE']==2){
                    $freelancer = Freelancer::where('USER_ID', $user['USER_ID'])->get();
                    $freelancer = json_decode(json_encode($freelancer[0]), true);
                    request()->Session()->put('freelancer',$freelancer);
                }

                if($user['USER_ROLE']==3){
                    $employee = Freelancer::where('USER_ID', $user['USER_ID'])->get();
                    $employee = json_decode(json_encode($employee[0]), true);
                    request()->Session()->put('employee',$employee);
                    return redirect('index');
                }

                return redirect('index');

            }else{

                return redirect()->route('login_user');

            }
        }else{

            return redirect()->route('login_user');

        }

    }elseif(admin::where('ADMIN_EMAIL', $email)->exist()){
        $adminDetails = admin::where('ADMIN_EMAIL', $email)->first();
        if(Hash::check($password,$adminDetails['ADMIN_PASSWORD'])){
            if( $adminDetails['ADMIN_STATUS'] == 1){
                //REDIRECT TO ADMIN DASHBOARD
                $request->Session()->put('adminDetails',$adminDetails);
                return redirect('admin.dashboard');
            }
                //ADMIN ACCOUNT HAS BEEN BLOCKED
                return redirect()->route('login_user');
        }else{
            return redirect('index');
    }

    }

}

}
