<?php

namespace App\Http\Middleware;

use Auth;
use Closure;

class isBanned
{

    public function handle($request, Closure $next)
    {
        $user = Auth::user();

        if ($user && $user->status == 0) {

            Auth::logout();

            return redirect('/')->withWarning('This account has been suspended.');
        }

        return $next($request);
    }
}   