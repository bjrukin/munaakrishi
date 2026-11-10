<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class SecureHeaders
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    private $unwantedHeaderList = ['X-Powered-By', 'server', 'Server'];
    public function handle(Request $request, Closure $next): Response
    {
        $this->removeUnwantedHeaders($this->unwantedHeaderList);
        $response = $next($request);
        $response->headers->set('Referrer-Policy', 'no-referrer-when-downgrade');
        $response->headers->set('X-XSS-Protection', '1; mode=block');
        $response->headers->set('X-Content-Type-Options', 'nosniff');
        $response->headers->set('X-XSS-Protection', '1; mode=block');
        $response->headers->set('Strict-Transport-Security', 'max-age=31536000; includeSubDomains; preload');
        $response->headers->set('Content-Security-Policy', "base-uri 'self';");
        $response->headers->set('Expect-CT', 'enforce, max-age=30');
        $response->headers->set('Permissions-Policy', 'autoplay=(self), camera=(self), encrypted-media=(self), fullscreen=(self), geolocation=(self), gyroscope=(self), magnetometer=(self), microphone=(self), midi=(self), payment=(self), sync-xhr=(self), usb=(self)');
        $response->headers->set('Access-Control-Allow-Origin', '*');
        $response->headers->set('Access-Control-Allow-Methods', 'POST, GET, OPTIONS, PUT, DELETE');
        $response->headers->set('Access-Control-Allow-Headers', 'Content-Type, X-Requested-With, Authorization, X-CSRF-Token');
        $response->headers->set('X-Frame-Options', 'SAMEORIGIN');
        return $response;
    }
    private function removeUnwantedHeaders($headerList)
    {
        foreach ($headerList as $header) {
            header_remove($header);
        }

    }
}
