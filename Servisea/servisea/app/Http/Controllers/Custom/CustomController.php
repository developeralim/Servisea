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
    //$password = Hash::make($data['password']);
    $password = $data['password'];
    //CHECK IF USER
    $user = DB::table('users')
                ->where('USER_EMAIL', $email)
                ->where('USER_PASSWORD',$password)
                ->get();

    if($user->isEmpty()){
    //CHECK IF ADMIN
    $admin = DB::table('admin')
            ->where('ADMIN_EMAIL', $email)
            ->where('ADMIN_PASSWORD',$password)
            ->get();

        if($admin->isEmpty()){
            $noUser = 1;
            return redirect('login',$noUser);
        }else{
            $result = json_decode($admin,true);
            if( $result[0]['ADMIN_STATUS'] == 1){
                //REDIRECT TO ADMIN DASHBOARD
                $admin["ADMIN_ID"] = $result[0]['ADMIN_ID'];
                session()->put('admin',$admin);
                return redirect('admin.dashboard');
            }else{
                //ADMIN ACCOUNT HAS BEEN BLOCKED
                $admin["ADMIN_ID"] = 0;
                session()->put('admin',$admin);
                return redirect('login');
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
