<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LabelPost extends Model
{
    use HasFactory;
    protected $table="label_post";
    protected $guarded=[];
}
