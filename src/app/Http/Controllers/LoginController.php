<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function Login()
    {
      if (Auth::check()) {
            return redirect("/dashboard");
      }
        return view('login');
    }

    public function CheckLogin(Request $request)
    {
        if ($request->has("email_address") && $request->has("password")) {
            $database_user = User::where('email_address', $request->get('email_address'))->first();

            $credentials = $request->only('email_address', 'password');

            if ($database_user != null) {
                if (Auth::attempt($credentials)) {
                    Auth::login($database_user, true);
                    return redirect()->intended('dashboard');
                } else {
                    return redirect()->back()->withInput()->withErrors("Username or password incorrect.");
                }
            } else {
                return redirect()->back()->withInput()->withErrors("Username or password incorrect.");
            }
        } else {
            return redirect()->back()->withErrors("You are missing the email address and password.");
        }
    }

    public function LogOut(Request $request)
    {
        // If the user is logged in.
        if (Auth::check()) {
            // Log them out.
            Auth::logout();
        }
        return redirect("/");
    }
}
