<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    /**
     * Display a listing of the resource.
     */


    /**
     * REGISTER METHOD.
     */
    public function register(Request $request)
    {
        return 'hello world';
    }

    /**
     * LOGIN METHOD.
     */
    public function login(Request $request)
    {
        //
    }


    /**
     * LOGOUT METHOD.
     */
    public function logout(string $id)
    {
        //
    }
}
