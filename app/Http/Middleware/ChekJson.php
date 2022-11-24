<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class ChekJson
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle($request, Closure $next)
    {
        $contentTypeHeader = $request->header('content-type');
        if ($contentTypeHeader != 'application/json') {
            return response()->json([
                'status'  => 'error',
                'message' => 'Plase use json.'], 400);
        }

        return $next($request);
    }
}
