<?php

namespace App\Http\Controllers;

use App\Models\Costum;
use App\Models\Category;
use Illuminate\Support\Facades\DB;
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
        $categories = Category::all();
        return view('add-costum', ['categories'=> $categories]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'costum_code' => 'required|unique:costums|max:255',
            'warna' => 'required|max:255',
            'image' => 'required|image|mimes:jpeg,png,jpg,jfif|max:2048',
            'category_id' => 'required|exists:categories,id'
        ]);
        $categories = Category::all();
        // // Generate the slug from the costum_code
        // $slug = Str::slug($request->costum_code); // Use Laravel's Str helper to create a slug
        $ImageName = time() . '.' . $request->image->extension();
        Storage::disk('public')->putFileAs('uploads/costums', $request->image, $ImageName);
        // // Check if a costum with the same slug already exists
        // $existingCostum = Costum::where('slug', $slug)->orWhere('slug', 'LIKE', "$slug-%")->first();
        // if ($existingCostum) {
        //     return redirect('costums')->with('error', 'Costum with this slug already exists.');
        // }
        // Create the new Costum
        $costums = Costum::create([ 
            'costum_code' => $request->costum_code,
            'warna' => $request->warna,
            'image' => $ImageName,
            'category_id' => $request->category_id,
            // 'slug' => $slug, // Save the slug in the database
        ]);
        return redirect('costums')->with('status', 'Costum Added Successfully');
    }

    public function edit($slug)
    {
        // \Log::info('Editing Costum with slug: ' . $slug); // Log the slug
        $costums = Costum::where('slug', $slug)->first();
        if (!$costums) {
            return redirect('costums')->with('error', 'Costum not found.');
        }
        $categories = Category::all();
        return view('edit-costum', ['costums' => $costums, 'categories' => $categories]);
    }

    public function update(Request $request, $slug)
    {
        // Mengambil data Costum berdasarkan slug
        $costums = Costum::where('slug', $slug)->first();
        // Jika tidak ditemukan, kembalikan respons not found
        if (!$costums) {
            return redirect('costums')->with('error', 'Costum not found.');
        }
        // Validasi input
        $request->validate([
            'costum_code' => 'required|unique:costums,costum_code,' . $slug,
            'warna' => 'required|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,jfif|max:2048',
            'category_id' => 'required|exists:categories,id'
        ]);
        // Memperbarui data
        $costums->costum_code = $request->costum_code;
        $costums->warna = $request->warna;
        // Menangani gambar jika ada
        if ($request->hasFile('image')) {
            $ImageName = time() . '.' . $request->image->extension();
            Storage::disk('public')->putFileAs('uploads/costums', $request->image, $ImageName);
            $costums->image = $ImageName; // Simpan nama gambar ke dalam model
            // \Log::info('Uploaded image: ' . $ImageName); // Log nama gambar yang diupload
        } 
        // Memperbarui slug (jika slug juga diperbarui)
        // $costums->slug = $request->slug;
        $costums->category_id = $request->category_id;
        $costums->save();
    
        // Redirect dengan pesan sukses
        return redirect('costums')->with('status', 'Costum updated successfully');
    }
    public function destroy($slug)
    {
        $costums = Costum::where('slug', $slug)->first();
    if ($costums) {
        $costums->delete();
        return redirect('costums')->with('success', 'Kategori berhasil dihapus.');
    }
        return redirect('costums')->with('error', 'Kategori tidak ditemukan.');
    }
}
