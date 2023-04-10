<?php

namespace App\Http\Controllers\Custom;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Category;

class CategoryController extends Controller
{
    public function insertCategory(Request $request){

        $category = $request->validate([
            'CATEGORY_NAME' => 'required|max:255',
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

        if($dataExist == 1){
            return view("admin.gig",['dataExist'=>$dataExist,'gigcategory'=>$AllCategory]);
        }
        return view("admin.gig",['gigcategory'=>$AllCategory]);
    }

    public function viewCategory(Request $request){

        $session= $request->session()->get('admin');
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

}
