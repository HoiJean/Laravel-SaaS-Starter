<?php

namespace App\Http\Middleware;

use Closure;

class PremiumMiddleware
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
      $authorisedAccess = ['premium', 'gold'];
      $access = \Auth::user()->access();

      if( $this->isUserAuthorised($access, $authorisedAccess)){
        return redirect()
          ->route('settings.upgrade')
          ->with('flash_info',
            'Upgrade your account to access these features.');
      }

      return $next($request);
    }

    private function isUserAuthorised($access, $authorisedAccess){
      return !in_array($access, $authorisedAccess);
    }
}
