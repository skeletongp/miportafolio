<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;

    protected $table="services";
    public function type()
    {
       return $this->belongsTo(Type::class);
    }
    public function getRouteKeyName()
    {
        return 'slug';
    }
}
