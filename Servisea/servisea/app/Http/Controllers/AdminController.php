<?php

namespace App\Http\Controllers;
use App\Models\admin;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index(){
        return view('admin.dashboard');
    }

    public function login(){
        return view('admin.auth.login_admin');
    }

    //VIEW LIST OF ALL ADMINS
    function show(){
        $users = DB::table('admin')->get();
        return view('admin.admin_view', ['users' => $users]);
    }

    function AuthenticateUser(){
        if ( DB::table('admin')->where('ADMIN_EMAIL', 'momo@gmail.com')->exists()) {
            return view('admin.auth.login_admin');
        }
    }

}
