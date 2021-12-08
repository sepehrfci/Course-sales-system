<?php

namespace Sepehrfci\User\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Verified;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\Request;
use Sepehrfci\User\Services\VerifyCodeService;

class VerifyEmailController extends Controller
{
    /**
     * Mark the authenticated user's email address as verified.
     *
     * @param  \Illuminate\Foundation\Auth\EmailVerificationRequest  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function __invoke(EmailVerificationRequest $request)
    {
        if ($request->user()->hasVerifiedEmail()) {
            return redirect()->intended(RouteServiceProvider::HOME.'?verified=1');
        }

        if ($request->user()->markEmailAsVerified()) {
            event(new Verified($request->user()));
        }

        return redirect()->intended(RouteServiceProvider::HOME.'?verified=1');
    }

    public function verify(Request $request)
    {
        if ($request->user()->hasVerifiedEmail()) {
            return redirect()->intended(RouteServiceProvider::HOME.'?verified=1');
        }

        if (VerifyCodeService::getCache(auth()->user()->id) == $request->verify_code){
            if ($request->user()->markEmailAsVerified()) {
                event(new Verified($request->user()));
            }
            VerifyCodeService::deleteCache(auth()->user()->id);
            return redirect()->intended(RouteServiceProvider::HOME.'?verified=1');
        }
        return back()->withErrors([
            'verify_code' => 'کد وارد شده صحیح نمیباشد.'
        ]);
    }
}
