<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CheckApiToken
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next, $api_token = null)
    {
        if(!$api_token){
            $api_token = config('app.api_internal_token');
        }
        $token = $request->input('token');

        if (!$token) {
            $token = $request->bearerToken();
        }
        if ($token != $api_token) {
            abort(403, 'Unauthorized action.');
        }
        return $next($request);
    }
}
