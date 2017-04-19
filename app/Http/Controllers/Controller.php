<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\Auth;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function __construct()
    {
        /**
         * you can't access the session or authenticated user
         * in your controller's constructor
         * because the middleware has not run yet.
         * As an alternative,
         * you may define a Closure based middleware
         * directly in your controller's constructor.
         */
        $this->middleware(function ($request, $next) {
            view()->share('signedIn', Auth::check());
            view()->share('user', Auth::user());
            return $next($request);
        });
    }
}
