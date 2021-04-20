<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function login(Request $rep)
    {
        $username = $rep->input('username');
        $password = $rep->input('password');
        $role = $rep ->input('role');
        dd('aaa');
        if ($username && $password && $role){
        //    return('Ban da dang nhap thanh cong');
             dd($username,$password,$role);
        }
        // return redirect()->back();

    }

    public function create() {
        return 'CHECK';
        // return view('layout.login');
    }
}
