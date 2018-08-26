<?php

namespace App\Http\Middleware;

use Closure;
use App\Aplikan;

class CanManageAplikanMiddleware
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
        if($request->method() == 'GET'){
            if($request->aplikan->pt_id == $request->user()->pt_id){                
                return $next($request);
            }
        }

        if($request->method() == 'POST'){
            $aplikan = Aplikan::find($request->aplikan_id);
            if($aplikan->pt_id == $request->user()->pt_id){                
                return $next($request);
            }
        }
        return redirect()->route('aplikan.saya')->with('danger','Anda tidak bisa mengelola Aplikan ini.');
    }
}
