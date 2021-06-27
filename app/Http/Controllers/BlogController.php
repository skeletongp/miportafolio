<?php

namespace App\Http\Controllers;

use App\Models\Label;
use App\Models\LabelPost;
use App\Models\Post;
use App\Models\Topic;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Livewire\WithFileUploads;

class BlogController extends Controller
{
    use WithFileUploads;
    public function index()
    {
        $post_1=[];
        $posts=Post::paginate(6);
        if($posts->count()){
            $post_1=Post::all()->random();
        }
        return view('blog.index', compact('posts', 'post_1'));
    }
    public function search(Request $request)
    {
        $search = $request->search;
        dd($search);
    }
    public function insert()
    {
        $topics = Topic::all();
        $labels = Label::orderBy('title')->get();
        return view('blog.insert', compact('topics', 'labels'));
    }
    public $rules = [
        "title" => 'required|max:50',
        "description" => 'required',
        "slug" => 'required|max:85',
        "is_active" => 'required',
        "topic_id" => 'required',
        "keys" => 'required',
        "image" => "required"
    ];
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
        $post->autor=$values['autor'];
        $post->image=$values['image'];
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
}
