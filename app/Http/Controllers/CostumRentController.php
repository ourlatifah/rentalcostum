<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Costum;
use App\Models\Category;
use App\Models\RentLog;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CostumRentController extends Controller
{
    public function index ()
    {
        $users = User::where('role_id', '!=', 1)->get();
        $categories = Category::all();
        $costums = Costum::all();
        return view ('costums-rent', ['users'=> $users, 'costums'=>$costums, 'categories'=> $categories]);
    }

    public function store(Request $request)
    {
        $request['rent_date'] = Carbon::now()->toDateString();
        $request['return_date'] = Carbon::now()->addDays(7)->toDateString();

        $costums = Costum::findOrFail($request->costum_id);
        $status = $costums->status; 

        // Periksa apakah status 'in stock'
        if ($status != 'in stock') {
            Session::flash('message', 'Cannot rent, costum not available');
            Session::flash('alert-class', 'alert-danger');
            return redirect('costums-rent');
        } 
        dd('ada');
        
        // // Redirect back with a success message
        // return redirect('costums-rent')->with('status', 'Costum rented successfully');
    }
}
