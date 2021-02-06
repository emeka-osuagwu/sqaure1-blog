<?php

namespace App\Http\Middleware\Custom;

use Closure;
use App\Http\Traits\ResponseTrait;
use Illuminate\Support\Facades\Auth;

class Authenticated
{

    use ResponseTrait;

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
        if (empty($request->header('authorization')) || $request->header('authorization') == "") {
            return $this->sendResponse('empty authorization', 'Unauthorized Token', 400, "1002");
        }
        
        if (!auth()->user()) {
            return $this->sendResponse('invalid authorization', 'Unauthorized Token', 400, "1001");
        }
        
        $request->auth_user = auth()->user();

        return $next($request);
    }
}
