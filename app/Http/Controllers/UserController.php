<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller as Controller;
use App\Http\Controllers\ValidateInput as ValidateInput;
use App\User;
use App\Models\Post ;
use Carbon\Carbon;
use Auth;

class UserController extends Controller{
    
    public function login_view()
    {
        return view('userLogin',[]);
    }
    
    public function login()
    {
      $errors = ValidateInput::login_validation();
      if($errors==NULL)
      {   $check= request()->except('_token');
          $check['status'] = 'active';
          if(auth()->attempt($check))
             return  redirect('home');
           else dd("incorrect login or password or your account does not active");
      }
      else { 
            return  redirect()->back()
             ->with('errors',$errors);
      }
    }
    
    public function registrate()
    {
        return view('userRegistrate',[]);
    }
    
    
    public function create(User $user)
    {
      $errors = ValidateInput::registration_validation();
      if($errors==NULL)
      {   
          $data=request()->except(['password','_token']);
          $data['password'] = bcrypt(request()->get('password'));
          $data['created_at'] = Carbon::now();
          $data['updated_at'] = Carbon::now();
          $data['remember_token'] = request()->get('_token');
          $user->create($data);
          $check['password']=request()->get('password');
          $check['email']=request()->get('email');
          $check['status']='active';
          if(auth()->attempt($check))
            return  redirect('home')->with('user',auth()->user());
          else
              dd('Oops something went wrong');
      }
      else 
      { 
            return  redirect()->back()
             ->with('errors',$errors);
      }
    }
    
    
    public function logout()
    {
        auth()->logout();
        return redirect('home');
    }
    
    
    public function account()
    {
        $post= new Post();
        $user= new User();
        if(auth()->user()->getRole()!='admin')
        return view('userAccount',[
            'posts' => $post->getAllPostsOfUser(auth()->id()),
            'user' => auth()->user()->getOriginals(),
                ]);
        
        else 
          return view('userAccount',[
            'posts' => $post->getAllPosts(),
            'user' => auth()->user()->getOriginals(),
            'users' => $user->getAllUsers(),
                ]);
    }
    
     public function update_view()
    {
         
        $user = new User();
        return view('userUpdate',['user' => $user->find(auth()->id())->getOriginals()]);
    }
    
    
    public function update($id,$user_id)
    {
             $user =new User();
             $user->myupdate($user_id);
             return redirect('user/' . auth()->id());
       
    }
    
    public function delete($id,$user_id)
    {
        $user = new User;
        $user->mydelete($user_id);
        return redirect('user/'.auth()->id());
    }
    
    public function block($id,$user_id)
    {
        $user = new User;
        $data['updated_at'] = Carbon::now();
        $data['status'] = 'bloked';
        $user->where('id','=',$user_id)->update($data);
        return redirect()->back();
    }
    
    public function unBlock($id,$user_id)
    {
        $user = new User;
        $data['updated_at'] = Carbon::now();
        $data['status'] = 'active';
        $user->where('id','=',$user_id)->update($data);
        return redirect()->back();
    }
    
    
    public function creatrOrFindUser()
    {
        dd('11');
    }
}

