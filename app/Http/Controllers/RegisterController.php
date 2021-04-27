<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\TryCreateUser;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use App\Jobs\SendRegistrationEmail;
use Illuminate\Support\Facades\Auth;

class RegisterController extends Controller
{
    public function Main()
    {
        return view('register');
    }

    public function MakeAccount(TryCreateUser $request)
    {
        $validated = $request->validated();
        $user = new User;
        $user->fill($validated);
        $user->password = Hash::make($request->password);
        $user->save();
        Auth::login($user);
        SendRegistrationEmail::dispatch($user);
        return view('landing');
    }
}
