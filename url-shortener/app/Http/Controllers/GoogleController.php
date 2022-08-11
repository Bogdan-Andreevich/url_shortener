<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;
use Exception;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class GoogleController extends Controller
{
    public function googleRedirect()
    {
        return Socialite::driver('google')->redirect();
    }

    public function googleCallback()
    {
        try {

            $user = Socialite::driver('google')->user();

            $searchUser = User::where('google_id', $user->id)->first();

            if($searchUser){

                Auth::login($searchUser);

                return redirect('/dashboard');

            }else{
                $googleUser = User::create([
                    'name' => $user->name,
                    'email' => $user->getEmail(),
                    'google_id'=> $user->getId(),
                    'auth_type'=> 'google',
                    'password' => encrypt('gitpwd059')
                ]);

                Auth::login($googleUser);

                return redirect('/dashboard');
            }

        } catch (Exception $e) {
            dd($e->getMessage());
        }
    }
}
