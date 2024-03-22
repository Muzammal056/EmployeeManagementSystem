<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\DB;
class checkAuthentication
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if(session('user')==1){
            return redirect('AddEmployee')->with('text_message','Welcome to Our Site');
    
        }
        else
        {
        return redirect('login')->with('error_message', 'Invalid username or password');
        }
    }
}
