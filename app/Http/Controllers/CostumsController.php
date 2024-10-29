<?php

namespace App\Http\Controllers;

use App\Models\Costum;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class CostumsController extends Controller
{
    public function index()
    {
        $costums = Costum::all();
        return view('costums',['costums' => $costums]);
    }

    public function add()
    {
        return view('add-costum');
    }

    public function store(Request $request)
    {
        $request->validate([
            'costum_code' => 'required|unique:costums|max:255',
            'warna' => 'required|max:255',
            'image' => 'required|image|mimes:jpeg,png,jpg,jfif|max:2048',
        ]);
    
        // Generate the slug from the costum_code
        $slug = Str::slug($request->costum_code); // Use Laravel's Str helper to create a slug
    
        $ImageName = time() . '.' . $request->image->extension();
        Storage::disk('public')->putFileAs('uploads/costums', $request->image, $ImageName);
    
        // Check if a costum with the same slug already exists
        $existingCostum = Costum::where('slug', $slug)->orWhere('slug', 'LIKE', "$slug-%")->first();
    
        if ($existingCostum) {
            return redirect('costums')->with('error', 'Costum with this slug already exists.');
        }
    
        // Create the new Costum
        $costums = Costum::create([ 
            'costum_code' => $request->costum_code,
            'warna' => $request->warna,
            'image' => $ImageName,
            'slug' => $slug, // Save the slug in the database
        ]);
        
        return redirect('costums')->with('status', 'Costum Added Successfully');
    }
}
