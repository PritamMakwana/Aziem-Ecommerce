<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ShopOwnerMiddleware
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
        if (Auth::guard('shop_owner')->check()) {
            // Get the authenticated shop owner's id
            $shopOwnerId = Auth::guard('shop_owner')->user()->id;

            // Redirect to the so-home route with the shop owner's id
            return redirect()->route('so-home', ['id' => $shopOwnerId]);
        }

        return $next($request);
    }
}
