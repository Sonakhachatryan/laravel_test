<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

class ValidateInput extends Controller{
     
    public static function login_validation(){
        $validate=validator(request()->all(),[
            'email' => 'required|email',
            'password' => 'required',
        ],[
            'required' => ':attribute fild must be filled.',
            'email' => 'Enter valid email.',
        ]);
        
       return   !$validate->fails()? Null:$validate->errors()->getMessages();
       

    }
    
    
    
    public static function registration_validation(){
        $ruls=[
            'first_name'=>'required',
            'last_name'=>'required',
            'email' => 'required|email|unique:users,email',
            'password' =>'required|confirmed|min:8',
            'password_confirmation' =>'required',
            'gender' => 'required',
            'birth_date' => 'required|date',
        ];
        $validate=validator(request()->all(),$ruls,[
            'required' => ':attribute fild must be filled.',
            'email' => 'Enter valid email.',
            'confirmed'=> 'Passwords does not match',
            'unique' => ':attribute already exsists.',
        ]);
        
       return   !$validate->fails()? Null:$validate->errors()->getMessages();
       

    }
}
