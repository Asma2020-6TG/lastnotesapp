<?php

namespace App\Http\Controllers\ApiNotes;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Tymon\JWTAuth\Facades\JWTAuth;
use Tymon\JWTAuth\Facades\JWTFactory;
use Tymon\JWTAuth\Contracts\Validator;
use Illuminate\Support\Facades\Response;
use Illuminate\Http\JsonResponse;

class RegisterController extends Controller
{
    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email'=>'required|string|email|max:255|unique:users',
            'name'=>'required|string|unique',
            'password'=>'required'
        ]);
        if ($validator -> fails()){
            return response()->json($validator->errors());
        }
        User::create([
            'name'=> $request->get('name'),
            'email'=> $request->get('email'),
            'password'=> bcrypt($request->get('password')),
        ]);
        $user =User::first();
        $token=JWTAuth::fromUser($user);
        return Response()::json(compact('token'));
    }
}
