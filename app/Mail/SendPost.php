<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\Models\Post;

class SendPost extends Mailable
{
    use Queueable, SerializesModels;

    
    public $visitor;
    public function __construct($visitor)
    {
        $this->visitor=$visitor;
    }

  
    public function build()
    {
  
        
        $post=Post::take(1)->latest('created_at')->first();
        $posts=Post::where('topic_id','=',$post->topic_id)->where('id','!=', $post->id)->paginate(6);
        return $this->from('smartdom.biz@gmail.com', 'Ismael Contreras')
        ->subject("Ismael Digitador- Nuevo Post")
        ->view('mails.sendpost')->with(['post'=>$post,'posts'=>$posts, 'visitor'=>$this->visitor]);
    }
}
