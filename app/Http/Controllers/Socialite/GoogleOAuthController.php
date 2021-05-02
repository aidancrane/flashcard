<?php

namespace App\Http\Controllers\Socialite;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;

class GoogleOAuthController extends Controller
{

      public function GoogleRedirect()
      {
        return Socialite::driver('google')->redirect();
      }

      public function GoogleCallback()
      {
        $user = Socialite::driver('google')->user();

        dd($user);

        $own_user = User::where();

        $user->getEmail();
      }

}
