<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Auth;

class AdminMiddlewere
{
   
    public function handle(Request $request, Closure $next): Response
    {
        if(Auth::check())
        {
            if(Auth::user()->type == 'admin')
            {
                return $next($request);
            }
            else{
                return redirect()->back();
                // Auth::logout();
                // return redirect(url('/'));
            }
        }else{
            return redirect(url('/'));
        }
    }
}
