<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\RentLog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{

    public function profile(Request $request)
    {
        $rentlogs = RentLog::with(['user', 'costum'])->where('user_id', Auth::user()->id)->get();
        return view('profile', ['rentlogs'=> $rentlogs]);
    }

    public function index(Request $request)
    {
        $users = User::where('role_id', 2)->get();
        return view('users',['users'=> $users]);
    }

    public function registeredUsers()
    {
        $registeredUsers = User::where('status', 'inactive')->get();
        return view('registered-users',['registeredUsers'=> $registeredUsers]);
    }

    public function show(Request $request, $slug)
    {
        $users = User::where('slug', $slug)->first();
        if (!$users) {
            return redirect('users');
        }
        return view('users-detail',['users'=> $users]);
    }

    public function approve(Request $request, $slug)
    {
        $users = User::where('slug', $slug)->first();
        $users->status = 'active';
        $users->save();
        return redirect('users-detail/'.$slug)->with('success', 'User approved successfully');
    }

        public function delete(Request $request, $id)
    {
        $user = User::findOrFail($id); 
        $user->delete();
        return redirect('users')->with('success', 'User  deleted successfully');
    }

    public function destroy(Request $request, $slug)
    {
        $users = User::where('slug', $slug)->first();
        $users->delete();
        return redirect('users')->with('success', 'User deleted successfully');
    }
    
    
    
}
