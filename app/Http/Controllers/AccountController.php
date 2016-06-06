<?php namespace App\Http\Controllers;
use Redirect;
use Socialize;
use Auth;
use App\Http\Controllers\UserController;

class AccountController extends Controller {
  // To redirect github
  public function facebook_redirect() {
    return Socialize::with('facebook')->redirect();
  }
  // to get authenticate user data
  public function facebook() {
     
    if(request()->has('code')){
        $user = Socialize::with('facebook');
        dd($user->user());
        $user_model = new User();
        $user = $user_model -> creatrOrFindUser();
        auth()->login($user, true);
    }
    dd(request()->all());
  }
  
  
  public function twitter_redirect() {
    return Socialize::with('facebook')->redirect();
  }
  // to get authenticate user data
  public function twitter() {
     dd(11);
    if(request()->has('code')){
        $user = Socialize::with('facebook');
        dd($user->user());
        $user_model = new User();
        $user = $user_model -> creatrOrFindUser();
        auth()->login($user, true);
    }
    dd(request()->all());
  }
  
  

}