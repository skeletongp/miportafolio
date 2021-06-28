<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Topic extends Model
{
    use HasFactory;
    public function posts()
    {
        return $this->hasMany(Post::class)->where('is_active','=',1);
    }
    public function getRouteKeyName()
    {
        return 'slug';
    }
}


