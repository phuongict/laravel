<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\MessageBag;

class CheckUserBlocked
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
        if(auth()->check()){
            if(auth()->user()->blocked === 1){
                //logout
                auth()->guard()->logout();
                $request->session()->invalidate();
                //send message
                $msg = new MessageBag();
                $msg->add('errors', trans('auth.error_blocked'));

                return redirect()->route('login')->withErrors($msg);
            }
        }
        return $next($request);
    }
}
