<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class UserAccess
{
    /**
     * Handle an incoming request.
     */
    public function handle(Request $request, Closure $next, $userType): Response
    {
        if(auth()->user()->type == $userType){
            return $next($request);
        }

        if ($request->ajax()) {
            return response('Unauthorized.', 401);
        } else {
            return redirect()->back()->with('error', 'You do not have permission to access requested page. Redirecting back!');
        }
    }
}
