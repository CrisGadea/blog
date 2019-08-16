<?php

namespace App\Http\Controllers;

use App\User;

class UsersController extends Controller
{
    function index()
    {
    /*    $user = new User();
        $user->name = 'Cristian';
        $user->email = 'cristian@test.com';

        return response()->json([$user],200); */

        // USAMOS ELOQUENT PARA LA BASE DE DATOS  (Descomentar en boostrap/App.php la línea de app->withEloquent)
        $users = User::all();
        return response()->json($users,200);
    }
}
