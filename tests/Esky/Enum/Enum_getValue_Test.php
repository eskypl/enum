<?php

namespace Esky\Enum;

use Esky\Enum\Mocks;

class Enum_getValue_Test extends \PHPUnit_Framework_TestCase
{
    public function test_it_should_return_value()
    {
        $enum = new Mocks\TestEnum(1);

        $this->assertEquals(1, $enum->getValue());
    }
}
