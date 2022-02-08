<?php

namespace App\Http\Middleware;

use App\Models\Admin\VisitorCounter;
use Closure;
use Illuminate\Http\Request;

class VisitorCounterMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        VisitorCounter::uniqueVisitor();
        return $next($request);
    }
}
