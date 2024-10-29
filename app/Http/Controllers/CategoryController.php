<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;

class CategoryController extends Controller
{

    public function index()
    {
        $categories = Category::all();
        return view('categories', ['categories' => $categories]);
    }

    public function add()
        {
            return view ('add-category');
        }

        public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:categories|max:255',
        ]);

        $categories = Category::create($request->all());
        return redirect('categories')->with('status', 'Category added successfully');
    }

    public function edit($slug)
    {
        $categories = Category::where('slug', $slug)->first();

        if (!$categories) {
        return redirect('categories')->with('error', 'Category not found.');
        }

        return view('edit-category', ['categories' => $categories]);
    }
    
    public function update(Request $request, $slug)
    {
        // Log slug yang diterima
        \Log::info('Updating category with slug:', ['slug' => $slug]);
        // Validasi permintaan yang masuk
        $categories = Category::where('slug', $slug)->first();
        // Cek apakah kategori ada
        if (!$categories) {
            \Log::error('Category not found for slug:', ['slug' => $slug]);
            return redirect('categories')->with('error', 'Category not found.');
        }
        // Validasi nama kategori
        $request->validate([
            'name' => 'required|max:255|unique:categories,name,' . $categories->id, // gunakan ID kategori
        ]);
        // Perbarui properti kategori
        $categories->name = $request->input('name');
        $categories->save();
        // Redirect dengan pesan sukses
        return redirect('categories')->with('status', 'Category updated successfully');
    }

    public function destroy($slug)
    {
        $categories = Category::where('slug', $slug)->first();
    if ($categories) {
        $categories->delete();
        return redirect('categories')->with('success', 'Kategori berhasil dihapus.');
    }
        return redirect('categories')->with('error', 'Kategori tidak ditemukan.');
    }
   
}
