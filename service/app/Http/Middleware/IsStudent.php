<?php

namespace App\Http\Middleware;

use Closure;

class IsStudent
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
        $user = $request->user();
        if($user->role_id != 2)
        {
            return response()->json([
                'error'=>'Unauthorised'
            ], 401); 
        }

        return $next($request);
    }
}
