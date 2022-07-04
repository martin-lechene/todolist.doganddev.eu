<?php

namespace App\Http\Middleware;

use Illuminate\Cookie\Middleware\EncryptCookies as Middleware;


    class IsAdmin
    {
        public function handle($request, Closure $next)
        {
            if (!auth()->check() || auth()->user()->email != 'admin@admin.com') {
                return redirect(route('home'));
            }

            return $next($request);
        }
    }

