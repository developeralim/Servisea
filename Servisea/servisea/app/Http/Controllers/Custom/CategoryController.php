<?php

namespace App\Http\Controllers\Custom;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Category;

class CategoryController extends Controller
{
    public function insertCategory(Request $request){

        #validation
        $category = $request->validate([
            'CATEGORY_NAME' => 'required|string|max:255|regex:/[a-zA-Z]/',
            'CATEGORY_DESCRIPTION' => 'required|max:255',
        ]);

        //$category = $request->input();

        $categoryDB = DB::table('category')
                      ->where('CATEGORY_NAME', $category['CATEGORY_NAME'])
                      ->get();

        if($categoryDB->isEmpty()){
            //if data does not exist - insert in DB
            $category_name = $category['CATEGORY_NAME'];
            $category_description = $category['CATEGORY_DESCRIPTION'];
            DB::insert('insert into category (CATEGORY_NAME,CATEGORY_DESCRIPTION) values (?, ?)', [$category_name, $category_description]);
        }else{
            //if data does exist - send
            $dataExist = 1;
        }
        $AllCategory = Category::all();

        if(isset($dataExist)){
            $category=[];
            return view("admin.gig",['dataExist'=>$dataExist,'gigcategory'=>$AllCategory]);

        }
        $category=[];
        return view("admin.gig",['gigcategory'=>$AllCategory]);
    }

    public function viewCategory(Request $request){
        $session= $request->session()->get('adminDetails');
        if ($session['ADMIN_ID'] != 0 ){
            $AllCategory = Category::all();
            return view("admin.gig",['gigcategory'=>$AllCategory]);
        }else{
        return redirect("login_user");
        }
    }

    public function editCategory(Request $requests){
        $AllCategory = Category::all();
        $cid= $requests->input('category_ID');
        return view("admin.gig",['test'=>$cid,'gigcategory'=>$AllCategory]);
    }

    public function deleteCategory(Request $request){
        $category = $request->input('category_ID');
        DB::delete('DELETE FROM category WHERE CATEGORY_ID = ?', [$category]);
        $AllCategory = Category::all();
        return redirect("admin/category")->with('gigcategory',$AllCategory);
    }

    public function updateCategory(Request $request){
         #validation
         $category = $request->validate([
            'CATEGORY_NAME' => 'required|string|max:255|regex:/[a-zA-Z]/',
            'CATEGORY_DESCRIPTION' => 'required|max:255',
        ]);

        //$category = $request->input();

        $categoryDB = DB::table('category')
                      ->where('CATEGORY_NAME', $category['CATEGORY_NAME'])
                      ->get();

        if($categoryDB->isEmpty()){
            //if data does not exist - insert in DB
            $category_name = $category['CATEGORY_NAME'];
            $category_description = $category['CATEGORY_DESCRIPTION'];
            DB::table('category')
              ->where('CATEGORY_ID', 1)
              ->update(['votes' => 1]);

        }else{
            //if data does exist - send
            $dataExist = 1;
        }
        $AllCategory = Category::all();

        if(isset($dataExist)){
            $category=[];
            return view("admin.gig",['dataExist'=>$dataExist,'gigcategory'=>$AllCategory]);

        }
        $category=[];
        return view("admin.gig",['gigcategory'=>$AllCategory]);

    }


}
