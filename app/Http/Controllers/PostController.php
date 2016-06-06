<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller as Controller;
use App\Models\Post;


class PostController extends Controller{
    
    public function create(Post $post)
    {
        $post->create();
        return redirect('user/'.auth()->id());
    }
    
    public function update(Post $post,$id,$post_id)
    {
         $post->update($post_id);
         return redirect('user/'.auth()->id());
    }
    
    public function delete(Post $post,$id,$post_id)
    {
        $post->delete($post_id);
        return redirect('user/'.auth()->id());
    }
    
  
    
    public function create_view()
    {
        return view('postCreate');
    }
    
    public function update_view($id,$post_id)
    {
       $post = new Post();
       return view('postUpdate',['post' => $post->reade($post_id)[0]]);
    }
}

