<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Middleware\OnlyAdmin;
use App\Http\Middleware\OnlyClient;
use App\Http\Middleware\OnlyGuest;
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

    public function registerProcess(Request $request)
    {
        $validation = $request->validate([
            'username' => 'required|unique:users|max:255',
            'password' => 'required',
            'phone' => 'max:13',
            'address' => 'required',
        ]);

        $user = User::create($request->all());

            Session::flash('status', 'success');
            Session::flash('message', 'Register Success');
            
        return redirect('/register');
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
                Auth::logout();
                $request->session()->invalidate();
                $request->session()->regenerateToken();
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

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('login');
    }  
    
}