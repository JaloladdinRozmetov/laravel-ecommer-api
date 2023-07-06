<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class AdminMiddleware
{
    /**
     * @param Request $request
     * @param Closure $next
     * @return \Illuminate\Http\JsonResponse|mixed
     */
    public function handle(Request $request, Closure $next)
    { // Check if the user is authenticated and is an admin
        if ($request->user() && $request->user()->admin) {
            return $next($request);
        }

        // Check if the authorization header exists and starts with "Bearer "
        if ($request->header('Authorization') && Str::startsWith($request->header('Authorization'), 'Bearer ')) {
            // Extract the token from the authorization header
            $token = Str::replaceFirst('Bearer ', '', $request->header('Authorization'));

            // Manually authenticate the user using the token
            $user = Auth::guard('sanctum')->authenticate($token);

            // Check if the user is an admin
            if ($user && $user->admin) {
                // Set the authenticated user manually
                Auth::guard('sanctum')->setUser($user);

                return $next($request);
            }
        }

        return response()->json(['message' => 'Unauthorized'], 401);
    }
}
