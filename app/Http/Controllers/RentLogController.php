<?php

namespace App\Http\Controllers;

use App\Models\Costum;
use App\Models\User;
use App\Models\Category;
use App\Models\RentLog;
use Carbon\Carbon;
use Illuminate\Http\Request;

class RentLogController extends Controller
{
    public function index()
    {
        $today = Carbon::now()->toDateString();
        $rentlogs = RentLog::with(['user', 'costum'])->get();
        return view('rent-log', ['rentlogs' => $rentlogs, 'today' => $today]);
    }
}
