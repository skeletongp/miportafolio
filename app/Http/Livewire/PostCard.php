<?php

namespace App\Http\Livewire;

use App\Models\Like;
use App\Models\Post;
use Livewire\Component;

class PostCard extends Component
{
    public $post, $views, $is_view, $likes, $is_liked;
    protected $listeners=['reload'=>'render'];
    public function render()
    {
        $this->likes=$this->post->likes->count();
        $like= new Like();
        $this->is_liked=$like->is_liked($this->get_client_ip(),$this->post->id);
        return view('livewire.post-card');
    }
    public function like()
    {
        $like=new Like();
        $like->post_id=$this->post->id;
        $like->user_ip=$this->get_client_ip();
        $like->save();       
        $this->emit('reload') ;
    }
    function get_client_ip()
    {
        if (isset($_SERVER["HTTP_CLIENT_IP"])) {
            return $_SERVER["HTTP_CLIENT_IP"];
        } elseif (isset($_SERVER["HTTP_X_FORWARDED_FOR"])) {
            return $_SERVER["HTTP_X_FORWARDED_FOR"];
        } elseif (isset($_SERVER["HTTP_X_FORWARDED"])) {
            return $_SERVER["HTTP_X_FORWARDED"];
        } elseif (isset($_SERVER["HTTP_FORWARDED_FOR"])) {
            return $_SERVER["HTTP_FORWARDED_FOR"];
        } elseif (isset($_SERVER["HTTP_FORWARDED"])) {
            return $_SERVER["HTTP_FORWARDED"];
        } else {
            return $_SERVER["REMOTE_ADDR"];
        }
    }
}
