<?php

namespace Esky\Enum;

use Esky\Enum\Mocks;

class Enum_Test extends \PHPUnit_Framework_TestCase
{
    public function test_it_should_return_array_of_all_class_constants_values()
    {
        $expected = array (1, 2, 3);
        $actual = Mocks\TestEnum::getValues();

        $this->assertEquals($expected, $actual);
    }

    public function test_it_should_throw_exception_when_there_are_duplicated_values()
    {
        $this->setExpectedException('\RuntimeException');

        Mocks\TestEnumWithDuplicatedValues::getValues();
    }
}
