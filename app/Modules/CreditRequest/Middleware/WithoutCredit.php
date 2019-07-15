<?php

namespace App\Modules\CreditRequest\Middleware;

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
        $user = $request->user()->isAdmin()
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
