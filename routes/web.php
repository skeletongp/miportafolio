<?php

use App\Http\Controllers\HomeController;
use App\Jobs\SendPostJob;
use App\Mail\SendPost;
use App\Models\Post;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Route;
use Laravel\Socialite\Facades\Socialite;



Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/dashboard', [HomeController::class, 'index'])->name('dashboard');
Route::get('/about', [HomeController::class, 'about'])->name('about');
Route::get('/services', [HomeController::class, 'services'])->name('services');
Route::middleware(['auth:sanctum'])->get('/services/new', [HomeController::class, 'newservice'])->name('newservice');
Route::middleware(['auth:sanctum'])->get('/migrate',  function () {
   Artisan::call('migrate');
});
Route::middleware(['auth:sanctum'])->post('/service/store', [HomeController::class, 'services_store'])->name('services_store');
Route::get('/services/{type}', [HomeController::class, 'services_search'])->name('services_search');
Route::get('/service/{show}', [HomeController::class, 'services_show'])->name('services_show');
Route::get('/lost', [HomeController::class, 'lost'])->name('lost');

Route::get('/subscribe', function () {
   Socialite::driver('google')->stateless();
   return Socialite::driver('google')->redirect();
})->name('subscribe');

Route::get('/unsuscribe/{visitor}',[HomeController::class, 'unsuscribe'])->name('unsuscribe');

Route::get('/result', [HomeController::class, 'subscribed'])->name('subscribed');

Route::get('/sendpost', function ()
{
   /* Para prueba */
  /*  $post=Post::take(1)->latest('created_at')->first();
   $posts=Post::where('topic_id','=',$post->topic_id)->paginate(6);
   return view('mails.sendpost')->with(['post'=>$post,'posts'=>$posts]); */
   /* Fin de prueba */

   SendPostJob::dispatch();
   return redirect()->route('home');
}) ->name('sendpost');