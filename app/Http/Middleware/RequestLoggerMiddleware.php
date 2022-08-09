<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class RequestLoggerMiddleware
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
        file_put_contents(storage_path() . '/request.log', $request->all(), FILE_APPEND);
        
        $response = $next($request);


        file_put_contents(storage_path() . '/response.log', $response, FILE_APPEND);


        return $response;
    }
}
