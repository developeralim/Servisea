<?php

namespace App\Http\Controllers\Custom;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Category;

class CategoryController extends Controller
{
    public function insertCategory(Request $request){
        $category = $request->input();
        $category = DB::table('category')
        ->where('CATEGORY_NAME', $category['name'])
        ->get();

            if($category->isEmpty()){
                $dataExist[0] = 1;
                return view("admin.gig",$dataExist);
            }else{
                $category_name = $category['CATEGORY_NAME'];
                $category_description = $category['CATEGORY_DESCRIPTION'];
                DB::insert('insert into category (CATEGORY_NAME,CATEGORY_DESCRIPTION) values (?, ?)', [$category_name, $category_description]);
                $dataExist[1] = 1;
                return view("admin.gig",$dataExist);
            }
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
