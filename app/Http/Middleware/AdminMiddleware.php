<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
// Http\Middlware\Auth未発見エラーを修正
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class AdminMiddleware
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
        $user = Auth::user();
        if ($user->id == '1') {
            return $next($request);
        } else {
            abort(404);
        }
    }
}
