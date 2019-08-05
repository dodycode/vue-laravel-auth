<?php

namespace App\Http\Controllers\Api\Auth;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use App\Http\Resources\User as UserResource;
use App\User;

use Auth;

class LoginController extends Controller
{
    public function login(Request $request)
    {
    	$request->validate([
            'email' => 'required|email',
            'password' => 'required|min:6'
        ]);

    	$user = new User;

    	if (!Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
    		return response()->json(['errors' => 'Your credentials not match any users'], 401);
    	}

    	$data = new UserResource($user->where('id', Auth::user()->id)->first());

    	//give private api_token for consume by client (only shows when success logged in)
    	return response()->json([
            'data' => $data, 
            'meta' => [
    		  'api_token' => Auth::user()->api_token
    	    ]
        ]);
    }
}
