<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\TryCreateUser;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class Register extends Controller
{
    public function Main()
    {
        return view('register');
    }

    public function MakeAccount(TryCreateUser $request)
    {
        $validated = $request->validated();

        $user = new User;
        $user->fill($request->all());
        $user->password = Hash::make($request->password);
        $user->save();
    }
}
