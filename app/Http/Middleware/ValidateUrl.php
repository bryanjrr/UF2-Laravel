<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class ValidateUrl
{
    public function handle(Request $request, Closure $next)
    {
        $url = $request->route('url');

        $url = filter_var($url, FILTER_SANITIZE_URL);

        if (!filter_var($url, FILTER_VALIDATE_URL) === false) {
            echo ("$url es una URL valida");
        } else {
            echo ("$url no es una URL valida");
            return redirect('/');
        }

        return $next($request);
    }
}
