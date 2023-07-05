<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;

class userAdminController extends Controller
{
    public function admin_view_user(){

        try {

            $admin= request()->session()->get('adminDetails');
            if(isset($admin)){

            $user =Crypt::decryptString(request()->route('user'));


            switch ($user) {
                case "PO":

                $po_list = User::where(['USER_ROLE'=>1])->get();
                return view('admin.poList',['po_List'=>$po_list,'user'=>request()->route('user')]);

                case "Freelancer":

                $f_list = User::join('freelancer', 'freelancer.USER_ID', '=', 'users.USER_ID')
                ->where(['USER_ROLE'=>2])
                ->get();

                return view('admin.poList',['po_List'=>$f_list,'user'=>request()->route('user')]);

                case "Employee":

                $emp_list = User::join('employee', 'employee.USER_ID', '=', 'users.USER_ID')
                ->where(['USER_ROLE'=>3])
                ->get();

                return view('admin.poList',['po_List'=>$emp_list,'user'=>request()->route('user')]);


                default:
                    return view('admin.dashboard');
              }

            }

            return view('index');

          } catch (\Exception $e) {

            return redirect("index");
          }

    }
    public function admin_update_user(){

        try{

            $admin= request()->session()->get('adminDetails');
            $user_id =Crypt::decryptString(request()->route('uid'));
            $user =Crypt::decryptString(request()->route('user'));

            if( $user_id && $user && $admin){

                if(user::where('USER_ID',$user_id)->exists()){

                    if(user::where(['USER_ID'=>$user_id,'ACCOUNT_STATUS' => 0])->exists()){

                        User::where('USER_ID', $user_id)->update(['ACCOUNT_STATUS' => 1 ]);

                    }else{

                        User::where('USER_ID', $user_id)->update(['ACCOUNT_STATUS' => 0 ]);

                    }

                    return redirect()->route('view_admin_user',request()->route('user'));

                }

                return redirect()->route('view_admin_user',request()->route('user'));

            }

            return redirect()->route('view_admin_user',request()->route('user'));


        } catch (\Exception $e) {
            return redirect()->route('view_admin_user',request()->route('user'));
        }

    }
    public function admin_delete_user(){

        try{

            $admin= request()->session()->get('adminDetails');
            $user_id =Crypt::decryptString(request()->route('uid'));
            $user =Crypt::decryptString(request()->route('user'));

            if( $user_id && $user && $admin){

                if(user::where('USER_ID',$user_id)->exists()){

                    User::where('USER_ID', $user_id)->delete();

                    return redirect()->route('view_admin_user',request()->route('user'));
            }
        }
        return redirect()->route('view_admin_user',request()->route('user'));

        } catch (\Exception $e) {

            return redirect()->route('view_admin_user',request()->route('user'));

        }
    }
}
