<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class AdminAuthenticate {

    /**
     * Handle an incoming request and ensure user authentication.
     */
    public function handle(Request $request, Closure $next): Response {
        if (Auth::guard('admin')->guest()) {
            if ($request->expectsJson()) {
                return response()->json(['message' => 'Unauthorized'], 401);
            }
            return redirect(route('admin.login'));
        }

        $response = $next($request);
        $response->headers->set('Cache-Control', 'no-store, no-cache, must-revalidate, max-age=0');
        $response->headers->set('Pragma', 'no-cache');                                        // HTTP 1.0
        $response->headers->set('Expires', gmdate('D, d M Y H:i:s', time() - 3600) . ' GMT'); // HTTP 1.0
        return $response;
    }
}