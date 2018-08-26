<?php

namespace App\Http\Middleware;
use Illuminate\Support\Facades\Auth;
use Closure;

class RbacMiddleware
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
        //Cek apakah User sudah login
        if(!Auth::check()){
            return redirect()->route('auth.login');
        }

        if(in_array(Auth::user()->role->id,[2,5])){
            return $next($request);    
        }
        //retrieve semua permission yang dimiliki user sesuai dengan rolenya
        $role = Auth::user()->role;
        $permissions = [];
        foreach($role->permissions as $perm){
            array_push($permissions,$perm->name_permission);
        }

        //cek apakah user memiliki permission yang dibandingkan dengan nama route
        if(!in_array($request->route()->getName(),$permissions)){
            return redirect()->route('auth.error401');
        }
        return $next($request);
    }
}
