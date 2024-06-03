<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class RolesChecker
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, $role): Response
    {

        if($request->user()->role !== $role){
            return redirect('/login');
        }
        return $next($request);



        // if(auth()->user()->role == $role){
        //     return $next($request);
        // }

        // return redirect()->route('/');

        // return redirect('/');


        // if(!Auth::check()) {
        //     return redirect("/login");
        // }

        // if($request->user()->role !==  $role) {
        //     return redirect("/login");
        // }
    }
}
