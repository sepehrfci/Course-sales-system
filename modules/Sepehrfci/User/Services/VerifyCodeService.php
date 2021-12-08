<?php

namespace Sepehrfci\User\Services;

use Exception;
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
     * @throws InvalidArgumentException
     * @throws Exception
     */
    public static function getCache($id)
    {
        try {
            return cache()->get('verify_email_' . $id);
        }
        catch (NotFoundExceptionInterface | ContainerExceptionInterface $e) {
            echo "ERROR";
        }
    }

    public static function deleteCache($id)
    {
        try {
            return cache()->delete('verify_email_' . $id);
        }
        catch (InvalidArgumentException | Exception $e) {
            echo "ERROR";
        }
    }
}
