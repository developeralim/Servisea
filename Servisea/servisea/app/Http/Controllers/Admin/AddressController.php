<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AddressController extends Controller
{
    public function viewAddressPage(Request $request){
        $sessionAdmin= $request->session()->get('adminDetails');
        if(isset($sessionAdmin)==null){
            return view("user.register");
        }else{
            return redirect('login_user');
        }

    }
}
