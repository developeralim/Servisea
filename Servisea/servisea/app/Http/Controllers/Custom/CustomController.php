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
    $data = $request->input();
    $email = $data['email'];
    $password = Hash::make($data['password']);
    $password = $data['password'];
    //CHECK IF USER
    $user = User::where('USER_EMAIL', $email)->get();

    if($user->isEmpty()){
        //CHECK IF ADMIN
     $admin = admin::where('ADMIN_EMAIL', $email)->get();

        if($admin->isEmpty()){
            $noUser = 1;
            return redirect('login',$noUser);
        }else{
            $adminDetails = json_decode(json_encode($admin[0]), true);
            if(Hash::check($password,$adminDetails['ADMIN_PASSWORD'])){
                if( $adminDetails['ADMIN_STATUS'] == 1){
                    //REDIRECT TO ADMIN DASHBOARD
                    $request->Session()->put('adminDetails',$adminDetails);
                    return redirect('admin.dashboard');
                }else{
                    //ADMIN ACCOUNT HAS BEEN BLOCKED
                    //$adminDetails[0]["ADMIN_ID"] = 0;
                    $request->Session()->put('adminDetails',$adminDetails);
                    return redirect('login');
                }
            }else{
                return redirect('index');
            }
        }
    }else{
        $user = json_decode(json_encode($user[0]), true);
        if($user['ACCOUNT_STATUS'] == 1){
            $request->Session()->put('user',$user);

            if($user['USER_ROLE']==2){
                $freelancer = Freelancer::where('USER_ID', $user['USER_ID'])->get();
                $freelancer = json_decode(json_encode($freelancer[0]), true);
                $request->Session()->put('freelancer',$freelancer);
            }

            return redirect('index');

            //$session = $request->session()->get('user');

         }else{
              return redirect('login');
         }
    }
}

}
