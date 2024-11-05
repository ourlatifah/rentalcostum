<?php

namespace App\Http\Controllers;
use App\Models\Costum;
use Illuminate\Http\Request;

class PublicController extends Controller
{
    public function index()
    {
        $costums = Costum::all();
        return view('costums-list',['costums'=>$costums]);
    }
}
