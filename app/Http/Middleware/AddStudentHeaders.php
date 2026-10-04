<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

final class AddStudentHeaders
{
    public function handle(Request $request, Closure $next): Response
    {
        $response = $next($request);
        $response->headers->set('X-Student-Variant', (string) config('lab2.variant'));
        $response->headers->set('X-Lab-Check', (string) config('lab2.check_code'));

        return $response;
    }
}
