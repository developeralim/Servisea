<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Gig;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;

class gigController extends Controller
{
    public function view_admin_gig(){

        try {

            $admin= request()->session()->get('adminDetails');
            if(isset($admin)){

                $gig_list = Gig::select('gig.GIG_ID','GIG_NAME','USERNAME','GIG_STATUS')
                ->Join('freelancer', 'gig.FREELANCER_ID', '=', 'freelancer.FREELANCER_ID')
                ->Join('users', 'users.USER_ID', '=', 'freelancer.USER_ID')
                ->Join('package', 'gig.GIG_ID', '=', 'package.GIG_ID')
                ->RightJoin('order', 'package.PACKAGE_ID', '=', 'order.PACKAGE_ID')
                ->distinct('GIG_ID')
                ->get();

                return view('admin.gigList',["gigList"=>$gig_list]);
            }

            return view('index');

          } catch (\Exception $e) {

            return redirect("index");
          }

    }
    public function admin_update_gig(Request $request){

        try{

            $admin= request()->session()->get('adminDetails');
            $gig_id =Crypt::decryptString(request()->route('id'));

            if( $gig_id && $admin){

                if(Gig::where('GIG_ID',$gig_id)->exists()){

                    if(Gig::where(['GIG_ID'=>$gig_id,'GIG_STATUS'=>"SUSPENDED"])->exists()){

                        GIG::where('GIG_ID', $gig_id)
                        ->update(['GIG_STATUS' => "COMPLETED" ]);

                    }else{

                        GIG::where('GIG_ID', $gig_id)
                        ->update(['GIG_STATUS' => "SUSPENDED" ]);

                    }

                    return redirect()->route('view_admin_gig');

                }

                return redirect()->route('view_admin_gig');

            }

            return redirect()->route('view_admin_gig');

        } catch (\Exception $e) {
            return redirect("index");
        }

    }


}
