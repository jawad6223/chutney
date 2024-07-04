<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class adminmiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if(auth()->check()){
            if(auth()->user()->user_role == 1  && auth()->user()->status == 1){
                return $next($request);
            }
            else{
                return redirect('admin/login');
            }
        }
        else{
            return redirect('admin/login');
        }
        
    }
}
