<?php


namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class PerusahaanMiddleware
{
    public function handle(Request $request, Closure $next): Response
    {
        if (auth()->check() && auth()->user()->role === 'perusahaan') {
            return $next($request);
        }

        abort(403, 'Akses hanya untuk perusahaan.');
    }
}
