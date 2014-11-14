<?php

namespace Esky\Enum;

use Esky\Enum\Mocks;

class Enum_construct_Test extends \PHPUnit_Framework_TestCase
{
    public function test_it_should_construct_properly_when_value_is_proper_type_and_exists_in_constants()
    {
        $enum = new Mocks\TestEnum(1);

        $this->assertInstanceOf('Esky\Enum\Mocks\TestEnum', $enum);
    }

    public function test_it_should_construct_properly_when_value_is_string_containing_valid_int()
    {
        $enum = new Mocks\TestEnum('1');

        $this->assertInstanceOf('Esky\Enum\Mocks\TestEnum', $enum);
    }

    public function test_it_should_throw_exception_when_value_is_string_containing_valid_int_on_beginning()
    {
        $this->setExpectedException('\InvalidArgumentException');

        new Mocks\TestEnum('1abc');
    }

    public function test_it_should_throw_exception_when_there_is_no_defined_value_constant_in_class()
    {
        $this->setExpectedException('\InvalidArgumentException');

        new Mocks\TestEnum(0);
    }

    public function test_it_should_construct_properly_with_null_value()
    {
        new Mocks\TestEnum(null);
    }
}
