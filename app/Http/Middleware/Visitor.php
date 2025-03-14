<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

use Symfony\Component\HttpFoundation\Response;

class Visitor
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (empty(Auth()->user()->role)) {
            return $next($request);
        }

        return redirect()->route('events.index');
        
    }
}
