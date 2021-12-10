<?php

namespace Sepehrfci\User\Services;

use App\Providers\RouteServiceProvider;
use Exception;
use Illuminate\Auth\Events\Verified;
use Psr\Container\ContainerExceptionInterface;
use Psr\Container\NotFoundExceptionInterface;
use Psr\SimpleCache\InvalidArgumentException;

class VerifyCodeService
{
    /**
     * @throws Exception
     */
    public static function generateCode(): int
    {
        return random_int(100000,999999);
    }

    /**
     * @throws Exception
     */
    public static function setCache($id,$code)
    {
        try {
            cache()->set(
                'verify_email_' . $id,
                $code,
                now()->addMinutes(2)
            );
        } catch (InvalidArgumentException $e) {
            dd('ERROR');
        }
    }

    /**
     * @throws Exception
     */
    public static function getCache($id)
    {
        try {
            return cache()->get('verify_email_' . $id);
        }
        catch (NotFoundExceptionInterface | ContainerExceptionInterface $e) {
            dd('ERROR');
        }
    }

    public static function deleteCache($id)
    {
        try {
            return cache()->delete('verify_email_' . $id);
        }
        catch (InvalidArgumentException | Exception $e) {
            dd('ERROR');
        }
    }

    public static function hasVerifiedEmail($request)
    {
        if ($request->user()->hasVerifiedEmail()) {
            return redirect()->intended(RouteServiceProvider::HOME . '?verified=1');
        }
    }

    /**
     * @throws InvalidArgumentException
     */
    public static function verifyEmail($request)
    {
        if (self::getCache(auth()->user()->id) == $request->verify_code){
            self::markEmailAsVerified($request);
            self::deleteCache(auth()->user()->id);
            return redirect()->intended(RouteServiceProvider::HOME.'?verified=1');
        }
    }

    public static function markEmailAsVerified($request)
    {
        if ($request->user()->markEmailAsVerified()) {
            event(new Verified($request->user()));
        }
    }
}
