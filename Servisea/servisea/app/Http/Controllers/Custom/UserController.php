<?php

namespace App\Http\Controllers\Custom;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function RegisterUser(Request $request){

        #validation
        $userInput = $request->validate([
            'USERNAME'        => 'required|string|max:255|regex:/^[a-zA-Z0-9_]+$/',
            'USER_EMAIL'      =>
            'USER_PASSWORD'   =>
            'USER_LNAME'      => 'required|string|max:255|regex:/^[a-zA-Z]+$/',
            'USER_FNAME'      => 'required|string|max:255|regex:/^[a-zA-Z]+$/',
            'USER_IMG'        =>
            'USER_DOB'        =>
            'USER_GENDER'     =>
            'USER_TEL'        =>
            'USER_CITY'       =>
            'USER_COUNTRY'    =>
            'USER_DISTRICT'   =>
            'USER_POSTALCODE' =>
       ]);

        //$category = $request->input();

        $categoryDB = User::where('CATEGORY_NAME', $category['CATEGORY_NAME'])
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


}
