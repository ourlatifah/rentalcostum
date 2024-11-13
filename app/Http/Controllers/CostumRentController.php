<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Costum;
use App\Models\Category;
use App\Models\RentLog;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
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
        // Set the rent and return dates
        $request['rent_date'] = Carbon::now()->toDateString();
        $request['return_date'] = Carbon::now()->addDays(3)->toDateString();

        $request->validate([
            'costum_id' => 'required|integer',
        ]);
        // Find the costume and check its status
        $costums = Costum::findOrFail($request->costum_id);
        // Check if the status is 'in stock'
        if ($costums->status !== 'in stock') {
            Session::flash('message', 'Cannot rent, costume not available');
            Session::flash('alert-class', 'alert-danger');
            return redirect('costums-rent');
        }
        // Count the number of RentLog entries where actual_return_date is null
        $count = RentLog::where('user_id', auth()->id()) // Assuming you have a user_id field in RentLog
                    ->where('costum_id', $request->costum_id)
                    ->where('actual_return_date', null) // Check for null values
                    ->count();
        // Check if the user has already rented 3 costumes
        if ($count >= 2) {
            Session::flash('message', 'Cannot rent, user already rented 3 costumes');
            Session::flash('alert-class', 'alert-danger');
            return redirect('costums-rent');
        }
            try {
            DB::beginTransaction();
            // Process insert to rent_log table
            RentLog::create($request->all());
            // Update the costume's status
            $costums->status = 'not available';
            $costums->save();
            DB::commit();
        
            Session::flash('message', 'Rent costume successfully');
            Session::flash('alert-class', 'alert-success');
            return redirect('costums-rent');
            } catch (\Throwable $th) {
                DB::rollBack();
                
                Session::flash('message', 'Cannot rent, an error occurred');
                Session::flash('alert-class', 'alert-danger');
                return redirect('costums-rent');
            }
    }
}
