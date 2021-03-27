<?php

namespace App\Http\Middleware;

use Closure;

class UserMiddleware {

    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next, $type)
    {
        if (auth()->user()->isAdmin())
            return $next($request);
        return redirect()->route('whatsapp.chats')->with("error", "ليس لديك صلاحية لهذه الصفحة");
    }
}