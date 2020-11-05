<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Login extends Controller
{
    public function Login()
    {
        return view('login');
    }

    public function CheckLogin()
    {
        return view('login');
    }
}
