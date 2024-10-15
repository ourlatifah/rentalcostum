<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Category;
use App\Models\Costum;
use App\Http\Middleware\OnlyAdmin;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class DashboardController extends Controller
{
    public function dashboard()
    {
        $costumCount = Costum::count();
        $categoryCount = Costum::count();
        $userCount = User::count();
        return view('dashboard', ['costumCount' => $costumCount, 'categoryCount' => $categoryCount, 'userCount' => $userCount]);
    }
}
