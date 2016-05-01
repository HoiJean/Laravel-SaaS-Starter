<?php

namespace App\Http\Middleware;

use Closure;

class StandardMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
      return redirect()
        ->route('upgrade')
        ->with('flash_info',
          'Upgrade your account to access these features.');
    }
}
