<?php

namespace App\Http\Controllers;
use App\Models\Costum;
use App\Models\Category;
use Illuminate\Http\Request;

class PublicController extends Controller
{
            public function index(Request $request)
        {
            $costums = Costum::query();
            if ($request->has('warna')) {
                $costums->where('warna', 'like', '%' . $request->warna . '%');
            }
            if ($request->has('category')) {
                $costums->whereHas('categories', function ($q) use ($request) {
                    $q->where('category_id', $request->category);
                });
            }
            // Ambil semua kategori untuk ditampilkan di tampilan
            $categories = Category::all();
            return view('costums-list', [
                'costums' => $costums->get(),
                'categories' => $categories,
            ]);
        }
}