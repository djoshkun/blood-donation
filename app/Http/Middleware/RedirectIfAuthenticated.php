<?php

namespace App\Http\Middleware;

use Closure;

class RedirectIfAuthenticated {

    public function handle($request, Closure $next, $role) {
        if (!auth()->check()) {
            return redirect()->back();
        }
        if ('' !== $role && $role !== auth()->user()->role) {
            return redirect()->route('index');
        }
        return $next($request);
    }

}
