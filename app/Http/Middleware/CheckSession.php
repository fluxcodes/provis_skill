<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Session;

class CheckSession
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle($request, Closure $next)
    {
        $ip = $request->ip();
        $existingSession = Session::get('active_session_'.$ip);

        if ($existingSession) {
            // Display JavaScript prompt
            return response()->view('prompt', ['userIp' => $ip]);
        }

        return $next($request);
    }
}
