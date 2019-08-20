<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class UsersController extends Controller
{
    function index(Request $request)
    {
    		$users = User::all();
        	return response()->json($user,200);
    }

    function createUser(Request $request)
    {
     		$data = $request->all();

     		$user = User::create([
     			'name' => $data['name'],
     			'username' => $data['username'],
     			'email' => $data['email'],
     			'password' => Hash::make($data['password']),
     			'api_token' => str_random(60)
     		]);	
        	return response()->json($user,201);
    }


    function login(Request $request)
    {
     		try {
     			$data = $request->all();
     			$user = User::where('username',$data['username'])->first();

     			if ($user && Hash::check($data['password'],$user->password)) {
     				return response()->json($user,200);
     			}
     			else {
     				return response()->json(['error' => 'No content'],406);
     			}
     		}catch (ModelNotFoundException $e) {
     			return response()->json(['error' => 'No content'],406);
     		}

     		return response()->json(['error'=> 'Unauthorized'],401,[]);
    }	
}
