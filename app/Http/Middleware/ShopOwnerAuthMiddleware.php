<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class ShopOwnerAuthMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        // Check if the user is authenticated as a shop owner
        if (!Auth::guard('shop_owner')->check()) {
            // If not authenticated, you can redirect to the login page or show an error message.
            // For example, to redirect to the login page:
            return redirect()->route('Stores');
        }

        return $next($request);
    }
}
