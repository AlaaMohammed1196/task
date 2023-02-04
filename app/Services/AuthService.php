<?php

namespace App\Services;

use App\Constants\App;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class AuthService
{

    public function createToken($token): array
    {
        return [
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => auth(App::API_GUARD)->factory()->getTTL() * App::EXPIRATION_TIME,
        ];
    }

    public function login($credentials,$guard)
    {
        return auth($guard)->attempt($credentials);
    }

    public function register($userData): void
    {
        User::create($userData);
    }

    public function logout($guard): void
    {
        auth()->guard($guard)->logout();
    }

    public function createTokenForSendResetPasswordLink($email): string
    {
        $token = Str::random(App::LENGTH_OF_RANDOM_TOKEN);
        DB::table('password_resets')->insert([
            'email' => $email,
            'token' => $token,
            'created_at' => date('Y-m-d H:i:s')
        ]);
        return $token;
    }

    public function sendResetPasswordLink($email): void
    {
        $token = $this->createTokenForSendResetPasswordLink($email);
        $url = $this->appEnvironmentService->getEnvironmentURL();
        $fullURL = $url . '?token=' . $token;
        $user = User::where('email', $email)->first();
        $parameters['fullURL'] = $fullURL;
        $this->mailService->sendMail(App::FORGET_PASSWORD_PAGE, App::FORGET_PASSWORD_SUBJECT,
            App::FORGET_PASSWORD_MESSAGE, $user, $parameters);
    }

    public function setNewPassword($request)
    {
        $updatePassword = DB::table('password_resets')->where(['token' => $request->token])->first();
        if (!$updatePassword) {
            return false;
        }
        User::where('email', $updatePassword->email)->update(['password' => Hash::make($request->new_password)]);
        DB::table('password_resets')->where(['email' => $updatePassword->email])->delete();
        return $updatePassword->email;
    }
}
