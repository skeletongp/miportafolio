<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class View extends Model
{
    use HasFactory;
    public function posts()
    {
        return $this->belongsTo(Post::class);
    }
    public function is_view($ip, $id)
    {
       if (View::where('ip','=',$ip)
       ->where('post_id','=',$id)
       ->where('fecha','=',date('Y-m-d'))
       ->count()==0) {
        return false;
       } else {
           return true;
       }
       
    }
}
