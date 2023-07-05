<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Gig;
use App\Models\Job_Request;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;

class jobAdminController extends Controller
{
    public function admin_view_jr(){

        try {

            $admin= request()->session()->get('adminDetails');
            if(isset($admin)){

                $jr_list = Job_Request::join('users', 'users.USER_ID', '=', 'job.POSTED_BY_USER')
                ->get();

                return view('admin.jrList',["jr_List"=>$jr_list]);
            }

            return view('index');

          } catch (\Exception $e) {

            return redirect("index");
          }

    }
    public function admin_update_jr(){



        try{

            $admin= request()->session()->get('adminDetails');
            $jr_id =Crypt::decryptString(request()->route('id'));

            if( $jr_id && $admin){

                if(Job_Request::where('JR_ID',$jr_id)->exists()){

                    if(Job_Request::where(['JR_ID'=>$jr_id,'JR_STATUS'=>"SUSPENDED"])->exists()){

                        Job_Request::where('JR_ID', $jr_id)->update(['JR_STATUS' => "CONFIRMED" ]);

                    }else{

                        Job_Request::where('JR_ID', $jr_id)->update(['JR_STATUS' => "SUSPENDED" ]);

                    }

                    return redirect()->route('view_admin_jr');

                }

                return redirect()->route('view_admin_jr');

            }

            return redirect()->route('view_admin_jr');

        } catch (\Exception $e) {
            return redirect()->route("view_admin_jr");
        }

    }
    public function admin_delete_jr(){

        try{

            $admin= request()->session()->get('adminDetails');
            $jr_id =Crypt::decryptString(request()->route('id'));

            if( $jr_id && $admin){

                if(Job_Request::where('JR_ID',$jr_id)->exists()){

                    Job_Request::where('JR_ID', $jr_id)->delete();
                }

                return redirect()->route('view_admin_jr');

            }

            return redirect()->route('view_admin_jr');

        } catch (\Exception $e) {
            return redirect()->route("view_admin_jr");
        }

    }

}
