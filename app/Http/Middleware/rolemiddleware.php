<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class rolemiddleware
{
    
   public function handle(Request $request, Closure $next, ...$roles)
{
    if (!Auth::check()) {
        return redirect('/');
    }

    $authuser = Auth::user();

    

    if (!in_array($authuser->role, $roles)) {
        abort(403, 'access denied');
    }

    return $next($request);
}
}
