<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;
use Sepehrfci\User\Rules\ValidPhone;

class PhoneValidationTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function test_phone_start_with_9()
    {
        $result = (new ValidPhone())->passes('', '0917294837');
        $this->assertEquals(0, $result);

    }
    public function test_phone_less_than_10_character()
    {
        $result = (new ValidPhone())->passes('','917294837');
        $this->assertEquals(0,$result);
    }
    public function test_phone_more_than_10_character()
    {
        $result = (new ValidPhone())->passes('','91729483799');
        $this->assertEquals(0,$result);
    }
}
