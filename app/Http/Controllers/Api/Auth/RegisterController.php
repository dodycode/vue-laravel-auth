<?php

namespace App\Http\Controllers\Api\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\User as UserResource;
use App\User;
use Hash;

class RegisterController extends Controller
{
    public function register(Request $request)
    {
    	$request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6|confirmed'
        ]);

    	$user = new User;
    	$registeredUser = $user->create([
    		'name' => $request->name,
    		'email' => $request->email,
    		'password' => Hash::make($request->password),
    		'api_token' => Hash::make($request->email),
    		'is_admin' => 0
    	]);

    	if($registeredUser){
    		$data = new UserResource($registeredUser);

    		return response()->json([
    			'data' => $data,
    			'meta' => [
    				'api_token' => $registeredUser->api_token
    			]
    		], 201);
    	}else{
    		return response()->json(['errors' => 'Whoops something were wrong!'], 500);
    	}
    }
}
