<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Service;
use App\Models\Type;
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
    public function services()
    {
        $type1=Type::find(1);
        $type2=Type::find(2);
        $type3=Type::find(3);
        $services=Service::paginate(9);
       return view('services', compact('type1','type2','type3', 'services'));
    }
    public function services_search(Type $type)
    {
        $type1=Type::find(1);
        $type2=Type::find(2);
        $type3=Type::find(3);
        $services=$type->services()->paginate(9);
       return view('services', compact('type1','type2','type3', 'services'));
    }
    public function lost()
    {
       return view('lostpage');
    }
}
