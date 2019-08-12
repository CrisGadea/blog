<?php

namespace App\Http\Controllers;

use App\User;

class UsersController extends Controller
{
    function index()
    {
        $user = new User();
        $user->name = 'Cristian';
        $user->email = 'cristian@test.com';

        return response()->json([$user],200);
    }
}
