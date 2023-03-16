<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
//use Twilio;

use App\Models\Setting;
use App\Mail\NewNotification;
use App\Mail\Twofa;
use Illuminate\Support\Facades\Mail;

use Carbon\Carbon;


class TwoFactorVerify
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
        $user = Auth::user();

        if (Auth::check() && $user->token_2fa) {
            if ($user->token_2fa_expiry->lt(now())) {
                $user->resetTwoFactorCode();
                auth()->logout();

                return redirect()->route('login')
                    ->withMessage('The two factor code has expired. Please login again.');
            }

            if (!$request->is('verify*')) {
                return redirect()->route('user.verify.index');
            }
        }

        return $next($request);
    }
}