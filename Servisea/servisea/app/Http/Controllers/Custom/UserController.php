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
            'USERNAME'        => 'required|string|max:255|regex:/^[a-zA-Z0-9_-.]+$/',
            'USER_EMAIL'      => 'required|email|unique:users|unique:admin,ADMIN_EMAIL',
            'USER_PASSWORD'   => 'required|string|min:6|regex:/^[a-zA-Z0-9_-.]+$/',
            'USER_LNAME'      => 'required|string|max:255|regex:/^[a-zA-Z-]+$/',
            'USER_FNAME'      => 'required|string|max:255|regex:/^[a-zA-Z]+$/',
            'USER_IMG'        => 'required|mimes:jpg,bmp,png',
            'USER_DOB'        => 'required|date_format:Y-m-d',
            'USER_GENDER'     => 'required|char|max:7',
            'USER_TEL'        => 'required|string|max:255|regex:/^[0-9]+$/',
            'USER_CITY'       => 'required|string|max:255|regex:/^[a-zA-Z-]+$/',
            'USER_COUNTRY'    => 'required|string|max:255|regex:/^[a-zA-Z-]+$/',
            'USER_DISTRICT'   => 'required|string|max:255|regex:/^[a-zA-Z-]+$/',
            'USER_POSTALCODE' => 'required|string|max:255|regex:/^[0-9]+$/'
       ]);

        //$category = $request->input();

        $userDB = User::where(function($query) use ($userInput){
                            $query->where('ADMIN_EMAIL', $userInput['USER_EMAIL'])
                            ->orWhere('ADMIN_USERNAME', $admin['ADMIN_USERNAME']);
                        })
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
