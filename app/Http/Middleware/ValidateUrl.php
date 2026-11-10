<?php
namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Str;
use Symfony\Component\HttpFoundation\Response;

class ValidateUrl
{

    public function handle(Request $request, Closure $next): Response
    {
        if (Str::contains(request()->getRequestUri(), '/index.php/')) {
            return Redirect::to(env('APP_URL'));
        } elseif (Str::contains(request()->getRequestUri(), '/index.php?')) {
            return Redirect::to(env('APP_URL'));
        } elseif (Str::contains(request()->getRequestUri(), '/index.php')) {
            return Redirect::to(env('APP_URL'));
        }

        if (!App::environment('local')) {
            $allowedHosts = [env('WEBSITE')];
            $url = $request->url();
            $host = parse_url($url, PHP_URL_HOST);
            if (! in_array($host, $allowedHosts)) {
                return redirect()->route('home');
            }
        }
        return $next($request);
    }
}
