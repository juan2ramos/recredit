<?php

namespace App\Http\Middleware;

use Closure;

class WithoutCredit
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Closure $next
     * @return mixed
     */

    public function handle($request, Closure $next)
    {
        $authUser = $request->user();

        $user = $authUser->isAdmin()
            ? $request->session()->get('userProcess') : $request->user();

        if (!$user) {
            abort(404);
        }

        if ($user->hasCredit()) {
            return redirect('/');
        }

        return $next($request);
    }
}
