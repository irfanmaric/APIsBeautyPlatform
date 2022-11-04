<?php

namespace App\Http\Controllers;

use App\Http\Requests\resetPasswordRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;

class ForgotPasswordController extends Controller
{
    public function forgotPassword():\Illuminate\Http\JsonResponse
    {
      $credentials = request()->validate(['email'=>'required|email']);

      Password::sendResetLink($credentials);

        return response()->json([
            'status' => true,
            'message' => 'Reset password link sent on your email !',
        ], 200);
    }
    public function resetPassword():\Illuminate\Http\JsonResponse
    {
        $credentials=request()->validate([
            'email'=>'required|email',
            'password'=>'required|string|max:25|confirmed',
            'token'=>'required|string'
        ]);
        $email_password_status = Password::reset($credentials,function ($user,$password){
            $user->forceFill([
                'password' => Hash::make($password)]);
           $user->save();

        });

        if($email_password_status==Password::INVALID_TOKEN) {
            return response()->json([
                'status' => false,
                'message' => "Invalid token !"
            ], 500);

        }
        return response()->json([
            'status' => true,
            'message' => 'Password changed successfully !',
        ], 200);
    }


}
