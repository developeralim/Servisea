<?php

namespace App\Http\Controllers\Custom;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\admin;
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
    $user = User::where('USER_EMAIL', $email)
                ->get();

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
                    session()->put('adminDetails',$adminDetails);
                    return redirect('admin.dashboard');
                }else{
                    //ADMIN ACCOUNT HAS BEEN BLOCKED
                    //$adminDetails[0]["ADMIN_ID"] = 0;
                    session()->put('adminDetails',$adminDetails);
                    return redirect('login');
                }
            }else{
                return redirect('index');
            }
        }
    }else{
        $user = json_decode($user,true);
        if($user[0]['ACCOUNT_STATUS'] == 0){
            return redirect('index');
        }else{
            $request->session()->put('user',$user);
            return redirect('index');
        }
    }
}

}
