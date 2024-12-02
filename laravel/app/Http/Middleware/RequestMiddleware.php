<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Models\User;

class RequestMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        //not applicable for get requests
        // get id from header
        $user_id = $request->user_id;
        $user = User::find($user_id);
        $user->requests_num += 1;
        $user->save();
        return $next($request);
    }
}
