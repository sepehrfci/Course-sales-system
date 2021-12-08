<?php

namespace Sepehrfci\User\Tests\Unit;

use Exception;
use PHPUnit\Framework\TestCase;
use Sepehrfci\User\Services\VerifyCodeService;

class VerifyCodeServiceTest extends \Tests\TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     * @throws Exception
     */
    public function test_generated_code_should_be_6_digits()
    {
        $code = VerifyCodeService::generateCode();
        $this->assertIsNumeric($code,'generated code  is not numeric');
        $this->assertLessThanOrEqual(999999,$code,'generated code is grater than 999999');
        $this->assertGreaterThanOrEqual(100000,$code,'generated code is less than 999999');
    }

    /**
     * @throws Exception
     */
    public function test_cache_should_be_stored()
    {
        $code = VerifyCodeService::generateCode();
        VerifyCodeService::setCache(1,$code);
        $this->assertEquals($code,cache('verify_email_1'),'cache and code is not equal');
    }
}
