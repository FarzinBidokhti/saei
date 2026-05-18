<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\LoginLog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class CheckActiveSession
{
    /**
     * Handle an incoming request.
     *
     * @param  Closure(Request): (Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (Auth::check()) {
            $sessionId = session()->getId();

            $active = LoginLog::where('session_id', $sessionId)
                ->whereNull('logout_at')
                ->exists();

            if (!$active) {
                Auth::logout();

                $request->session()->invalidate();
                $request->session()->regenerateToken();

                return redirect()
                    ->route('login')
                    ->with('خطا', 'Session شما به دلیل ورود از دستگاه دیگر خاتمه یافت.');
            }
        }

        return $next($request);
    }
}
