<?php

namespace App\Http\Controllers;
 
use App\Http\Controllers\Controller as Controller;
use App\Models\Post;
use App\User ;

class HomeController extends Controller{
    
    
    public function index()
    {
        $posts=new Post();
        $posts=$posts->selectPostsForHome(session()->get('locale'));
        return view('home',['posts' => $posts]);
    }
}

