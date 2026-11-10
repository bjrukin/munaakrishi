<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class BlockSiteDownloaders
{
    protected $blockedUserAgents = [
        'wget', 'httrack', 'curl', 'libwww', 'python-requests', 'scrapy', 'java', 'teleport', 'siteSucker'
    ];

    public function handle(Request $request, Closure $next): Response
    {
        $userAgent = strtolower($request->header('User-Agent', ''));

        foreach ($this->blockedUserAgents as $bot) {
            if (str_contains($userAgent, $bot)) {
                abort(403, 'Access Denied');
            }
        }

        return $next($request);
    }
}