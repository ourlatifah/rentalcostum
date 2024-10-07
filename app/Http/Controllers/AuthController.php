<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;


class AuthController extends Controller
{
    public function login()
    {
        return view('login');
    }

    public function register()
    {
        return view('register');
    }

    public function authenticating(Request $request)
    {
        $credentials = $request->validate([
            'username' => ['required'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)) 
        {
            if (Auth::user()->status != 'active') {
                Session::flash('status', 'valid');
                Session::flash('message', 'Your account not active');
                return redirect('login');
            } 
            $request->session()->regenerate();
            if (Auth::user()->role_id == 1) {
                 return redirect('/dashboard');
            }
            if (Auth::user()->role_id == 2) {
                return redirect('/profile');
            }
            else
            {
                Session::flash('status', 'failed');
                Session::flash('message', 'Log in Invalid');
                return redirect('/register');
             }
        }
    }   
    
}