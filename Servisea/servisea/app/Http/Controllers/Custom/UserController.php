<?php

namespace App\Http\Controllers\Custom;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function viewRegisterPage(Request $request){
        $sessionAdmin= $request->session()->get('adminDetails');
        $sessionUser= $request->session()->get('userDetails');
        if(isset($sessionAdmin)==null&&isset($sessionUser)==null){
            return view("user.register");
        }else{
            return redirect('login_user');
        }

    }

    public function RegisterUser(Request $request){

        #validation
        $userInput = $request->validate([
            'USERNAME'        => 'required|string|max:255|regex:/^[a-zA-Z0-9_-.]+$/|unique:users|unique:admin,ADMIN_USERNAME',
            'USER_EMAIL'      => 'required|email|unique:users|unique:admin,ADMIN_EMAIL',
            'USER_PASSWORD'   => 'required|string|min:6|regex:/^[a-zA-Z0-9_-.]+$/',
            'USER_LNAME'      => 'required|string|max:255|regex:/^[a-zA-Z-]+$/',
            'USER_FNAME'      => 'required|string|max:255|regex:/^[a-zA-Z]+$/',
            'USER_IMG'        => 'required|mimes:jpg,bmp,png',
            'USER_DOB'        => 'required|before:'.now()->subYears(18)->toDateString(),
            'USER_GENDER'     => 'required|char|max:7',
            'USER_TEL'        => 'required|string|max:255|regex:/^[0-9]+$/',
            'USER_CITY'       => 'required|string|max:255|regex:/^[a-zA-Z-]+$/',
            'USER_COUNTRY'    => 'required|string|max:255|regex:/^[a-zA-Z-]+$/',
            'USER_DISTRICT'   => 'required|string|max:255|regex:/^[a-zA-Z-]+$/',
            'USER_POSTALCODE' => 'required|string|max:255|regex:/^[0-9]+$/'
       ]);

       User::insert();



    }


}
