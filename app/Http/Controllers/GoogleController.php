<?php

namespace App\Http\Controllers;


use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Laravel\Socialite\Socialite;
use Throwable;

class GoogleController extends Controller
{
    public function login() {
        try {
            return Socialite::driver('google')->redirect();
        } catch(  \Throwable $th) {
            throw $th;
        }
    }

    public function callback() {
      try{
        $googleUser = Socialite::driver('google')->user();
        $userExist = User::where('email', $googleUser -> email) -> first();

        if($userExist) {
            Auth::login($userExist);

            User::where('email', $googleUser -> email) ->update([
                'google_id' => $googleUser -> id
            ]);

            return redirect('/');

        } else {
            User::create([
                'name' => ucwords($googleUser -> name),
                'email' => ucwords($googleUser -> email),
                'google_id' => ucwords($googleUser ->id),
                'password' => bcrypt(Str::random(16)),
                'remember_token' => Str::random(10),
                'email_verified_at' => Carbon::now(),
            ]);

            return redirect('/');
        }

      } catch(  \Throwable $th) {
        throw $th;
      }
    }

    public function logout(Request $request) {
        Auth::logout(); // This clears the authentication information in the user's session

        $request->session()->invalidate(); // Invalidates the current session

        $request->session()->regenerateToken(); // Regenerates the CSRF token for security

        return redirect('/'); // Redirect the user to the desired page (e.g., home or login)
    }
}
