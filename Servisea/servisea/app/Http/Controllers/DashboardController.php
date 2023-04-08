<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    //

    public function index(){
        // do some login
        // get some data
        $data = array();
        return view("dashboard.index")->with("data", $data);
    }
}
