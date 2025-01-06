<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;
use Log;

class VerifyToken
{
    /**
     * Handle an incoming request.
     *
     * @param Request $request
     * @param Closure $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next): mixed
    {
        $token = $request->query('key');
        $storedToken = Config::get('s.secret_token');
//        $storedToken = env('API_KEY');

        if ($storedToken != $token) {
            Log::info("Stored Token: $storedToken");
            Log::info("Incoming Token: $token");

            return response()->json(['error' => 'Unauthorized'], 401);
        }

        return $next($request);
    }
}
