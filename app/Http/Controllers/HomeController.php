<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Project;
use App\Models\Service;
use App\Models\Type;
use App\Models\Visitor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;
use Laravel\Socialite\Facades\Socialite;

class HomeController extends Controller
{
   public function index()
   {
      $categories = Category::get();
      Artisan::call('migrate', ['--force' => true]);
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
   public function subscribed()
   {
      try {
         $socialUser = Socialite::driver('google')->stateless()->user();
         $visitor = new Visitor();
         $visitor->name = $socialUser->name;
         $visitor->email = $socialUser->email;
         $visitor->avatar = $socialUser->avatar;
         $visitor->save();
         echo "<script>alert ('Gracias por suscribirte');window.location.href='http://ismaeldigitador.com/blog'</script>";
      } catch (\Exception $e) {

         echo "<script>alert ('Ya estás registrado en este sitio');window.location.href='http://ismaeldigitador.com/blog'</script>";
      }
      $account=Socialite::driver('google')->stateless()->user()->id;
   }
   public function unsuscribe($visitor)
   {
      try {
         $visitor = Visitor::find($visitor);
         $visitor->delete();
         echo '<script>alert("Lamentamos que te hayas ido")</script>';
      } catch (\Throwable $th) {
         return redirect()->route('blog');
      }
   }
}
