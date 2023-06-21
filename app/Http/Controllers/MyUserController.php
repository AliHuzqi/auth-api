<?php

namespace App\Http\Controllers;

use App\Models\user;
use Illuminate\Http\Request;

class MyUserController extends Controller
{
	// Create User Login Function
    public function login(Request $request)
    {

    	$result = auth()->attempt($request->only(['email', 'password']));
    	if ($result) {
    		$token = auth()->user()->createToken('react', [auth()->user()->type])->accessToken;
    		return $token;
    	} else {
    		return 'User Not Found';
    	}
    }

    public function test(Request $request) {
    	// dump(auth()->user()->tokenCan('admin'));
    	// dd(auth()->user() != null && auth()->user()->tokenCan('admin'));
    	if (auth()->user() != null && auth()->user()->tokenCan('admin')) {
    		dd('success');
    	}
    	dd('error');
    }
}
