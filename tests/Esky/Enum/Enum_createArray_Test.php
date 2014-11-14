<?php

namespace Esky\Enum;

use Esky\Enum\Mocks;

class Enum_createArray_Test extends \PHPUnit_Framework_TestCase
{

    public function test_it_should_throw_exception_when_there_are_duplicated_values()
    {
        $this->setExpectedException('\RuntimeException');
        Mocks\TestEnumWithDuplicatedValues::createArray();
    }

    public function test_it_should_return_array_of_instances()
    {
        $actual = Mocks\TestEnum::createArray();

        $this->assertInternalType('array', $actual);
    }

    public function test_it_should_return_array_with_number_of_values_equals_number_of_defined_values_when_no_argument_used()
    {
        $actual = Mocks\TestEnum::createArray();

        $this->assertEquals(3, count($actual));
    }

    public function test_it_should_return_instances_of_Enum()
    {
        $actual = Mocks\TestEnum::createArray();

        $this->assertInstanceOf('Esky\Enum\Mocks\TestEnum', $actual[0]);
    }

    public function test_it_should_return_array_of_Enum_with_values_passed_in_argument()
    {
        $value = 2;
        $actual = Mocks\TestEnum::createArray(array($value));

        $this->assertEquals($value, $actual[0]->getValue());
    }
}

