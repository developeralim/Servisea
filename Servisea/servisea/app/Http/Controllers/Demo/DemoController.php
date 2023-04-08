<?php

namespace App\Http\Controllers\Demo;
use App\Http\Controllers\Controller;
use App\Models\admin;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

class DemoController extends Controller
{
    public function Index(){
        return view('about');
    }

    public function inndex(): View
    {
        $users = DB::table('admin')->get();
        return view('admin.admin_view', ['users' => $users]);
    }

    public function contact()
    {
        //return view('contact');
        $data = DB::table("select * from admin")->get();
    }

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
                    $request->session()->put('admin',$admin);
                    return redirect('admin.dashboard');
                }else{
                        //ADMIN ACCOUNT HAS BEEN BLOCKED
                        $admin["ADMIN_ID"] = 0;
                        $request->session()->put('admin',$admin);
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
