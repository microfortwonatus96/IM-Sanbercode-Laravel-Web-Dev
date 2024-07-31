<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function register(){
        return view('register');
    }

    public function welcome(Request $request){
        $firstName = $request->input('firstname');
        $lastName = $request->input('lastname');
        return view('welcome', [
            'firstName' => $firstName,
            'lastName' => $lastName
        ]);
    }
}
