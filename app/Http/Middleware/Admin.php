<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use App\User;

class Admin
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
        if(Auth::check()){
            if(auth()->user()->isAdmin == 1){
                return $next($request);
              }
            
            else {
                return redirect('dangnhap');
            }
        } else {
            return redirect('dangnhap');
        }

    }
}
