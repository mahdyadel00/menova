<?php

namespace App\Http\Controllers;

use App\Models\Provider;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class AuthSocialiteController extends Controller
{
    public function redirectToProvider($provider)
    {
        return Socialite::driver($provider)->redirect();
    }

    public function handleProviderCallback($provider)
    {
        try {
            $user = Socialite::driver($provider)->user();
            // Check user if already logged with provider.
            $is_user_exists = Provider::where('user_id', $user->getId())->first();
            if (!$is_user_exists) {
                // Check if user already registered by email.
                $registeredUser = User::where('email', $user->getEmail())->first();
                if (!$registeredUser) {
                    // Create new.
                    $registeredUser = User::updateOrCreate([
                        'email' => $user->getEmail(),
                        'password' => bcrypt($user->getName() . '@' . $user->getId()),
                        'phone' => null,
                        'email_verified_at' => \now(),
                    ]);
                }
                // Create provider.
                Provider::create([
                    'provider_name' => $provider,
                    'provider_id' => $user->getId(),
                    'user_id' => $registeredUser->id,
                ]);
                Auth::loginUsingId($registeredUser->id);
            } else {
                Auth::loginUsingId($is_user_exists->id);
            }
            return redirect()->route('frontend.get_complete_profile');
        } catch (\Throwable $th) {
            throw $th;
        }
    }
}