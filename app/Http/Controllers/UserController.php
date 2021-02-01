<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function newUser(){
        return view('site.register');
    }
    public function newUser2(){
        return view('auth.register');
    }
}
