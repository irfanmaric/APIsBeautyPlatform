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
use function PHPUnit\Framework\isNull;

class UserController extends Controller
{
    //get All users
    function allUser(): \Illuminate\Http\JsonResponse
    {
        $users=User::all();
        if($users->isEmpty())
        {
            return response()->json([
                'success' => false,
                'message' =>'There are no users'
            ],400);
        }
        else
        {
            return response()->json([
                'success' => true,
                'data' => [
                    'users' => $users
                ]
            ],200);
        }

    }
    //get Users by ID
    function userID($id=null): \Illuminate\Http\JsonResponse
    {
        $user = User::find($id);
        if(empty($user))
        {
            return response()->json([
                'success' => false,
                'message' => 'User does not exist!'
            ], 400);
        }
        else
        {
            return response()->json([
                'success' => true,
                'data' => [
                    'user' => $user
                ]
            ],200);
        }

    }
    //get Users by Name
    function search($name): \Illuminate\Http\JsonResponse
    {
        $users = User::where("name","like","%".$name."%")->get();
        if($users->isEmpty())
        {
            return response()->json([
                'success' => false,
                'message' => 'User with that name does not exist!'
            ], 400);
        }
         else {
            return response()->json([
                'success' => true,
                'data' => [
                    'user' => $users
                ]
            ], 200);
        }
    }
    function deleteUser($id): \Illuminate\Http\JsonResponse
    {
        $res=User::where('id',$id)->delete();
        if(!$res)
        {
            return response()->json([
                'success' => false,
                'message' => 'User is not deleted'
            ], 400);
        }
        else {
            return response()->json([
                'success' => true,
                'message'=>'User deleted'
            ], 200);
        }
    }
}
