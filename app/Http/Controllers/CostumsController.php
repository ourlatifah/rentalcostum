<?php

namespace App\Http\Controllers;

use App\Models\Costum;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CostumsController extends Controller
{
    public function costums()
    {
        return view('costums');
    }
}
