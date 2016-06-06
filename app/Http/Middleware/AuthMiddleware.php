<?php

namespace App\Http\Middleware;

use App\Models\Post;
use Closure;

class AuthMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        
        $uri=explode('/',request()->url());
        if($uri[3]!= 'user')
             if(auth()->check())
                 return redirect('home');
             else {
                 return $next($request);
             }
        if(auth()->check())
        { 
            if(auth()->user()->getRole()!='admin')
            {
               $uri=explode('/',request()->url());
               if(count($uri)==5) return $next($request);
               if($uri[5]=='post')
                   {
                     if($uri[6]=='create') return $next($request);
                        else
                        {
                            $post=new Post();
                            if($post->selectUserId($uri[7])->author_id==auth()->id())
                                return $next($request);
                        }
                   }
               if($uri[5]=='user')
                   {
                          if($uri[6]!='block' || $uri[6]!='unblock')
                            if($uri[7]==auth()->id())
                                return $next($request);
                        
                   }
               
            }
            else
            {   
               return $next($request);
            }
        }
        else
        {
            return redirect('home');
        }
    
    
    }
    
    
}
