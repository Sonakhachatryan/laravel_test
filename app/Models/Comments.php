<?php

namespace App\Models;

class Comment
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'post_id', 'user_id', 'parent_id','comment' ,
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
         'remember_token',
    ];
    
    public function create(){}
    public function reade(){}
    public function update(){}
    public function delete(){}
}


