<?php

namespace App\Http\Controllers\custom;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class jobController extends Controller
{

    public function viewRequestJobPage(Request $request){

        $sessionUser= $request->session()->get('userDetails');
        if(isset($sessionUser)==null){
            return view("user.postJob");
        }else{
            return redirect('login_user');
        }
    }

}
