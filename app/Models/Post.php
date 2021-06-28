<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    protected $guarded=[];
    public function autor()
    {
       return $this->belongsTo(User::class, 'user_id');
    }
    public function category()
    {
       return $this->belongsTo(Topic::class, 'topic_id');
    }
    public function labels()
    {
       return $this->belongsToMany(Label::class, LabelPost::class);
    }
    public function getRouteKeyName()
    {
        return 'slug';
    }
}
