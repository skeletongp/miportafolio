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
      $categories = Category::get();
      return view('dashboard', compact('categories'));
   }
   public function about()
   {
      return view('about');
   }
   public function services()
   {
      $type1 = [];
      $type2 = [];
      $type3 = [];
      if (Type::all()->count()) {
         $type1 = Type::find(1);
         $type2 = Type::find(2);
         $type3 = Type::find(3);
      }
      $services = [];
      $show = [];
      if (Service::all()->count()) {
         $services = Service::paginate(9);
         $show = Service::all()->random();
      }

      $slug = "";
      return view('services', compact('type1', 'type2', 'type3', 'services', 'show', 'slug'));
   }
   public function services_search(Type $type)
   {
      $type1 = Type::find(1);
      $type2 = Type::find(2);
      $type3 = Type::find(3);
      $services = $type->services()->paginate(9);
      $show = $type->services->all()[0];
      $categoria = $type->title;
      $slug = $type->slug;
      return view('services', compact('type1', 'type2', 'type3', 'services', 'show', 'categoria', 'slug'));
   }
   public function services_show(Service $show)
   {
      $type1 = Type::find(1);
      $type2 = Type::find(2);
      $type3 = Type::find(3);
      $services = Service::paginate(9);
      $slug = "";

      return view('services', compact('type1', 'type2', 'type3', 'services', 'show', 'slug'));
   }
   public function lost()
   {
      return view('lostpage');
   }
}
