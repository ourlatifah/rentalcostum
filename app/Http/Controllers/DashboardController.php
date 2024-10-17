<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Category;
use App\Models\Costum;
use App\Http\Middleware\OnlyAdmin;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class DashboardController extends Controller
{
    public function dashboard()
    {
        $costumsCount = Costum::count();
        $categoriesCount = Category::count();
        $userCount = User::count();
        return view('dashboard', ['costumsCount' => $costumsCount, 'categoriesCount' => $categoriesCount, 'userCount' => $userCount]);
    }
}
