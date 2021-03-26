<?php

namespace App\Http\Controllers;
use Auth;
use App\user;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    function login()
    {
        return view('auths.login');
    }
    function logout()
    {
        Auth::logout();
        return redirect('/login');
    }
    function postlogin(Request $request)
    {
        if (Auth::attempt($request->only('email','password'))){
            return redirect('/dashboard');
        }
        return redirect('/login');
    }
    function profil ()
    {
        $user = user::all();
        return view ('profil',compact('user'));
    }
    
}
