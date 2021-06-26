<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $categories=Category::get();
       return view('dashboard', compact('categories'));
    }
    public function about()
    {
       return view('about');
    }
    public function lost()
    {
       return view('lostpage');
    }
}
