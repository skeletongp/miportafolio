<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Label;
use App\Models\LabelPost;
use App\Models\Post;
use App\Models\Service;
use App\Models\Topic;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Livewire\WithFileUploads;
use Livewire\WithPagination;

class BlogController extends Controller
{
    use WithFileUploads;
    use WithPagination;
    /* Página principal de los blogs */
    public function index()
    {
        $post_1=[];
        $post_2=[];
        $posts=Post::where('is_active','=',1)->orderBy('id','desc')->paginate(6);
        $topics=Topic::paginate(5);
        $services=[];
        if(Service::all()->count()){
            $services=Service::get()->random(4);
        }
        if($posts->count()){
            $post_1=Post::where('is_active','=',1)->get()->random();
            $post_2=Post::where('is_active','=',1)->where('id','!=', $post_1->id)->get()->random();
        }
        return view('blog.index', compact('posts', 'post_1', 'post_2', 'topics', 'services'));
    }

    /* Muestra los blogs de una categoría */
    public function category(Topic $category)
    {
        $post_1=[];
        $post_2=[];
        $posts=Post::where('is_active','=',1)->where('topic_id','=',$category->id)->orderBy('id','desc')->paginate(6);
        $topics=Topic::paginate(5);
        $services=Service::get()->random(4);
        if($posts->count()){
            $post_1=Post::where('is_active','=',1)->get()->random();
            $post_2=Post::where('is_active','=',1)->where('id','!=', $post_1->id)->get()->random();
        }
        return view('blog.categories', compact('posts', 'post_1', 'post_2', 'topics', 'services'));
    }
    /* Muestra los detalles de un post */
    public function show(Post $post)
    {
        $topics=Topic::paginate(5);
        $services=Service::get()->random(4);
        return view('blog.show', compact('post','topics','services'));
    }
    /* Muestra los post que coinciden con el parámetro */
    public function search(Request $request)
    {
        $search = $request->search;
        $post_1=[];
        $post_2=[];
        $posts=Post::where('is_active','=',1)
        ->where('title','like','%'.$search.'%')
        ->orWhere('description','like','%'.$search.'%')
        ->orWhere('extract','like','%'.$search.'%')
        ->orderBy('id','desc')->paginate(6);
        $topics=Topic::paginate(5);
        $services=[];
        if(Service::all()->count()){
            $services=Service::get()->random(4);
        }
        if($posts->count()>0){
            $post_1=Post::where('is_active','=',1)->get()->random();
            $post_2=Post::where('is_active','=',1)->where('id','!=', $post_1->id)->get()->random();
        }
        return view('blog.index', compact('posts', 'post_1', 'post_2', 'topics', 'services'));
    }
    /* Muestra la vista para ingresar un nuevo post */
    public function insert()
    {
        $topics = Topic::all();
        $labels = Label::orderBy('title')->get();
        return view('blog.insert', compact('topics', 'labels'));
    }
    
    /* Muestra la vista de edición */
    public function update(Post $post)
    {
        $topics = Topic::all();
        $labels = Label::orderBy('title')->get();
        return view('blog.update', compact('topics', 'labels', 'post'));
    }
    public $rules = [
        "title" => 'required|max:100',
        "description" => 'required',
        "slug" => 'required|max:85',
        "is_active" => 'required',
        "topic_id" => 'required',
        "keys" => 'required',
        "extract" => 'required',
        "image" => "required"
    ];
    public $rules2 = [
        "title" => 'required|max:100',
        "description" => 'required',
        "slug" => 'required|max:85',
        "is_active" => 'required',
        "topic_id" => 'required',
        "extract" => 'required',
    ];
    /* Permite ingresar un nuevo post */
    public function store(Request $request)
    {
        $this->validate($request, $this->rules);
        if ($request->hasFile('image')) {
            $originName = $request->file('image')->getClientOriginalName();
            $fileName = pathinfo($originName, PATHINFO_FILENAME);
            $extension = $request->file('image')->getClientOriginalExtension();
            $fileName = $fileName . '_' . time() . '.' . $extension;
            $request->file('image')->move(public_path('images'), $fileName);
            $url = asset('images/' . $fileName);
            $values=$request->all();
            $values['image']=$url;;
            $values['user_id']=Auth::user()->id;;

           
        }
        $post = new Post();
        $post->title=$values['title'];
        $post->slug=$values['slug'];
        $post->description=$values['description'];
        $post->is_active=$values['is_active'];
        $post->user_id=$values['user_id'];
        $post->image=$values['image'];
        $post->extract=$values['extract'];
        $post->topic_id=$values['topic_id'];
        if($post->save()){
            $keys = explode(',', $request->keys);
            foreach ($keys as $key) {
               $label_post= new LabelPost();
               $label_post->post_id=$post->id;
               $label_post->label_id=$key;
               $label_post->save();
            }
        }
       return redirect()->route('blog');
    }
     /* Permite ingresar un nuevo post */
     public function edit(Post $post, Request $request)
     {
         $this->validate($request, $this->rules2);
         $values=$request->all();
           
         $values['user_id']=Auth::user()->id;;
         $post->title=$values['title'];
         $post->slug=$values['slug'];
         $post->description=$values['description'];
         $post->is_active=$values['is_active'];
         $post->user_id=$values['user_id'];
         $post->extract=$values['extract'];
         $post->topic_id=$values['topic_id'];
        $post->save();
        return redirect()->route('blog');
     }
 
}
