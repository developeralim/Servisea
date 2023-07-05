<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\department;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\DB;

class departmentController extends Controller
{
    //view department page
    public function view_admin_department(){

        try {

            $admin= request()->session()->get('adminDetails');
            if(isset($admin)){

                $department = department::get();

                if(request()->route('name')){


                    if(department::where('DEPARTMENT_NAME', Crypt::decryptString(request()->route('name')))->exists()){

                        $dept_name =Crypt::decryptString(request()->route('name'));

                        $department_edit = department::where('DEPARTMENT_NAME',$dept_name)->get();

                        return view('admin.department',["department"=>$department,"edit"=>$department_edit]);

                    }

                    return view('admin.department',["department"=>$department]);

                }

                return view('admin.department',["department"=>$department]);
            }

            return view('index');


          } catch (\Exception $e) {

            return redirect("index");
          }



    }

    public function admin_insert_department(){

        try{

                #validation
            $department = request()->validate([
                'Department_Name' => 'required|string|max:255|regex:/[a-zA-Z ]/',
            ]);

            if(!department::where('DEPARTMENT_NAME', $department['Department_Name'])->exists()){
                department::insert([
                    'DEPARTMENT_NAME'=>$department['Department_Name']
                ]);

                return redirect()->route('view_admin_department');
            }

            return redirect()->route('view_admin_department',["insert_exist"=>1]);


        } catch (\Exception $e) {
            return redirect("index");
        }

    }
    public function admin_delete_department(Request $request){

        try{

            $admin= request()->session()->get('adminDetails');
        $dept_id =Crypt::decryptString(request()->route('id'));

        if($dept_id && $admin){

            if(department::where('DEPARTMENT_ID',$dept_id)->exists()){

                DB::delete('DELETE FROM department WHERE DEPARTMENT_ID = ?', [$dept_id]);
            }

        }
            return redirect()->route('view_admin_department');

        } catch (\Exception $e) {
            return redirect("index");
        }



    }

    public function admin_update_department(Request $request){

        try{

            $admin= request()->session()->get('adminDetails');
            $dept_id =Crypt::decryptString(request()->route('id'));

            if( $dept_id && $admin){

                if(department::where('DEPARTMENT_ID',$dept_id )->exists()){

                    $input = request()->validate([
                        'Department_Name' => 'required|string|max:255|regex:/[a-zA-Z ]/',
                    ]);

                    DB::table('department')
                    ->where('DEPARTMENT_ID', $dept_id)
                    ->update(['DEPARTMENT_NAME' => $input['Department_Name']]);

                    return redirect()->route('view_admin_department');

                }

            }

            return redirect()->route('view_admin_department');

        } catch (\Exception $e) {
            return redirect("index");
        }

    }

}
