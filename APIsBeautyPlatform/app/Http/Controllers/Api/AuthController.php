<?php

namespace App\Http\Controllers\Api;
use App\Http\Controllers\Controller;
use App\Http\Requests\createUserRequest;
use App\Http\Requests\loginUserRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{

//Create User function
    public function createUser(createUserRequest $request): \Illuminate\Http\JsonResponse
    {
        try {
            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password)
            ]);


            return response()->json([
                'status' => true,
                'message' => 'User created successfully',
                'token' => $user->createToken('APPLICATION')->accessToken
            ], 200);
        } catch (\Throwable $th) {
            return response()->json([
                'status' => false,
                'message' => $th->getMessage()
            ], 500);
        }


    }
    // Login User function
    public function login(loginUserRequest $request): \Illuminate\Http\JsonResponse
    {

        try {
            $password=Hash::make($request->input('password'));

            if(!Auth::attempt($request->only(['email','password']))){
                return response()->json([
                    'status'=>false,
                    'message'=>'Email or password does not match'
                ],401);
            }
                $user = User::where('email',$request->email)->first();
                return response()->json([
                    'status' => true,
                    'message' => 'User Logged in successfully',
                    'token' =>  $user->createToken('APPLICATION')->accessToken
                ], 200);

        } catch (\Throwable $th) {
            return response()->json([
                'status' => false,
                'message' => $th->getMessage()
            ], 500);
        }
    }
//Logout User
    public function logoutUser(Request $request): \Illuminate\Http\JsonResponse{
        if ($request->user()) {
            $request->user()->tokens()->delete();
        }return response()->json(['message' => 'User logged out'],
            200);
    }

}
