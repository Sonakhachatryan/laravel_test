<?php

namespace App\Models;

class Category
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'cat_name_en', 'cat_name_ru', 'description_en','description_ru' ,
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
