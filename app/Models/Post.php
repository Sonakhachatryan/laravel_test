<?php

namespace App\Models;
use DB;
use Carbon\Carbon;

class Post
{
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title_en', 'title_ru', 'content_en','content_ru' ,'author_id','images','category','remember_token',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
         'remember_token',
    ];
    
    public function create(){
        $data=request()->except('_token');
        $data['author_id'] = auth()->id();
        $data['category'] = '1';
        $data['created_at'] = Carbon::now();
        $data['updated_at'] = Carbon::now();
        $data['remember_token'] = request()->get('_token');
        DB::table('posts') -> insert($data);
    }
    public function reade($id){
        return DB::table('posts') ->where('post_id', '=', $id)->get();
    }
    
    public function update($id){
        $data;
        if(request()->get('images')==NULL)
            $data=request()->except(['images','_token']);
        else 
            $data=request()->except('_token');
        $data['updated_at'] = Carbon::now();
        DB::table('posts') 
                -> where('post_id','=',$id)
                -> update($data);
    }
    public function delete($post_id){
        DB::table('posts')->where('post_id', '=', $post_id)->delete();
    }
    
    public function getAllPosts(){
       return DB::table('posts')->get();  
    }
    
    
    public function getAllPostsOfUser($id){
        return DB::table('posts') ->where('author_id', '=', $id)->get();
    }
    
    
    public function selectPostsForHome($lang)
    {
       return  DB::table('posts') -> select([
                   'title_' . $lang . ' as title',
                   'content_' . $lang . ' as content',
                   'images',
                   'created_at',
                   'author_id',
                 ])->get();
    }
    
    public function selectUserId($id)
    {
        return  DB::table('posts')
                -> select('author_id')
                -> where('post_id', '=' ,$id)
                ->get()[0];
    }
}

