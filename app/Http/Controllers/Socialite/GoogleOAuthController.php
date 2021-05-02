<?php

namespace App\Http\Controllers\Socialite;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;
use App\Jobs\SendRegistrationEmail;
use App\Models\User;
use Auth;

class GoogleOAuthController extends Controller
{

      public function GoogleRedirect()
      {
        return Socialite::driver('google')->redirect();
      }

      public function GoogleCallback()
      {
        $user = Socialite::driver('google')->user();

        $own_user = User::where("email_address", $user->getEmail())->first();

        if (!($user->email_verified == true))
        {
          // User is logging in with an account from google that doesn't have a verified email address.
          // We don't do that here.
          return view("errors.socialite-email-not-verified");
        }

        if ($own_user)
        {
          // Account exists locally.
          if (strlen($own_user->google_user_id) > 0)
          {
            // User already has a google account on their local account.
            if ($own_user->google_user_id == $user->id)
            {
              // User has logged in before with their google account.
              // And the google id matches.
              Auth::login($own_user);
            }
            else {
              // User is logging in with an account different from the normal.
              // And the google account id does not match.
              return view("errors.socialite-email-not-verified");
            }
          }
          else
          {
            // Account does exist locally but not with a google id.
            $own_user->google_user_id = $user->id;
            if ($own_user->email_verified_at == "" || $own_user->email_verified_at == null)
            {
              // Email is verified now.
              $own_user->email_verified_at = Carbon::now();
            }
            $own_user->save();
            Auth::login($own_user);
          }
          // Send 'em back.
          return view('landing');
        }
        else
        {
          // Account does not exist locally.

          // Almost unique username, doesn't work if another user has a name like aidancrane1.
          $user_count = User::where('first_name', '=', $user->given_name)->where('last_name', '=', $user->family_name)->count();

          $new_user = new User();
          $new_user->google_user_id = $user->id;
          $new_user->first_name = $user->given_name;
          $new_user->last_name = $user->family_name;
          $new_user->friendly_name = $user->given_name;
          $new_user->email_verified_at = Carbon::now();
          $new_user->email_address =  $user->getEmail();
          $new_user->save();
          Auth::login($new_user);
          SendRegistrationEmail::dispatch($new_user);
          return view('landing');
        }


      }

}
