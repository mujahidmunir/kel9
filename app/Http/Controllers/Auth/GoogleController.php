<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Laravel\Socialite\Facades\Socialite;

class GoogleController extends Controller
{
    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function handleGoogleCallback()
    {
        try {

            $user = Socialite::driver('google')->user();

            $finduser = User::where('email', $user->getEmail())->first();

            if($finduser){

                Auth::login($finduser);
                if($finduser->hasRole('admin')){
                    return redirect('/admin/dashboard');
                } else {
                    return redirect('/');
                }

            }else{

                $newUser = new User();
                $newUser->name = $user->getName();
                $newUser->email = $user->getEmail();
                $newUser->google_id = $user->getId();
                $newUser->avatar = $user->getAvatar();
                $newUser->password = Hash::make('123');
                $newUser->save();
                $newUser->assignRole('user');

                Auth::login($newUser);

                return redirect('/');
            }

        } catch (Exception $e) {
            dd($e->getMessage());
        }
    }
}
