<?php

namespace Esky\Enum;

use Esky\Enum\Mocks;

class Enum_createFromConstantName_Test extends \PHPUnit_Framework_TestCase
{
    public function test_it_should_create_properly_when_constant_with_given_name_exists()
    {
        $enum = Mocks\TestEnum::createFromConstantName('ONE');

        $this->assertInstanceOf('Esky\Enum\Mocks\TestEnum', $enum);
    }

    public function test_it_should_throw_exception_when_there_is_no_constant_with_given_name()
    {
        $this->setExpectedException('\InvalidArgumentException');

        new Mocks\TestEnum('ABC');
    }
}
