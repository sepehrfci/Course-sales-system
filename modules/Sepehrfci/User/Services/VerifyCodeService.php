<?php

namespace Sepehrfci\User\Services;

use Exception;
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
            echo "Error";
        }
    }
}
