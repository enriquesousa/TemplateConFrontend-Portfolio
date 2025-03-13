<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class LocalizationMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // dd($request->user());

        // Si no hay user login
        if (!$request->user()) {

            // Set Locale in this "Request" es español por defecto
            $locale = $request->session()->get('locale') ?? 'es';
            app()->setLocale($locale);

            return $next($request);
        }

        // Si hay user login, get language from user
        $language = $request->user()->language;

        if (isset($language)) {
            app()->setLocale($language);
        }

        return $next($request);
    }
}
