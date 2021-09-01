<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\traits\SearchableTrait;
class Post extends Model
{
    use HasFactory, SearchableTrait;
    protected $guarded=[];

    protected $searchable = [
       
      'columns' => [
          'posts.title' => 10,
          'posts.slug' => 10,
          'posts.extract' => 10,
          'posts.description' => 10,
          'topics.title' => 2,
          'topics.description' => 5,
          'topics.slug' => 5,
          'labels.title'=>10,
          'labels.meta'=>10,
          

      ]
      ,
      'joins' => [
          'topics' => ['posts.topic_id','topics.id'],
          'label_post'=>['posts.id','label_post.post_id'],
          'labels'=>['label_post.label_id','labels.id']
      ],
  ];
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
    public function views()
    {
       return $this->hasMany(View::class);
    }
    public function likes()
    {
       return $this->hasMany(Like::class);
    }
}
