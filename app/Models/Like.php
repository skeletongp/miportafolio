<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Like extends Model
{
    use HasFactory;

    public function is_liked($ip, $id)
    {
       if (Like::where('user_ip','=',$ip)
       ->where('post_id','=',$id)
       ->count()==0) {
        return false;
       } else {
           return true;
       }
       
    }
}
