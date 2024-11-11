<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Costum;
use App\Models\Category;
use Illuminate\Http\Request;

class CostumRentController extends Controller
{
    public function index ()
    {
        $users = User::where('role_id', '!=', 1)->get();
        $categories = Category::all();
        $costums = Costum::all();
        return view ('costums-rent', ['users'=> $users, 'costums'=>$costums, 'categories'=> $categories]);
    }
}
