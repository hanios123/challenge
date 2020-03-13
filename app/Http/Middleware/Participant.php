<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class Participant
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
        if (Auth::user()->auth == 'participant' || Auth::user()->auth == 'organizer' || Auth::user()->auth == 'admin') {
            return $next($request);
        }

        abort(403);
    }
}
