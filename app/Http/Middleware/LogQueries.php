<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class LogQueries
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        //process to save the request data into the database;
        // if($request->title == '')
        //     $request->title = 'filled from middleware';

        return $next($request);
    }
}
