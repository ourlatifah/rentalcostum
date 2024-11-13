<?php

namespace App\Http\Controllers;

use App\Models\Costum;
use App\Models\User;
use App\Models\Category;
use App\Models\RentLog;
use Illuminate\Http\Request;

class RentLogController extends Controller
{
    public function index()
    {
        $rentlogs = RentLog::with(['user', 'costum'])->get();
        return view('rent-log', ['rentlogs' => $rentlogs]);
    }
}
