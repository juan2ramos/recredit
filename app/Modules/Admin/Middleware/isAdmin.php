<?php

namespace App\Modules\Admin\Middleware;

use Closure;

class isAdmin
{


    public function handle($request, Closure $next)
    {
        if (!$request->user()->isAdmin()){
            return redirect()->route('client.dashboard');
        }

        return $next($request);
    }
}
