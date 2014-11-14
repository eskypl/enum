<?php

namespace Esky\Enum;

use Esky\Enum\Mocks;

class Enum_getNames_Test extends \PHPUnit_Framework_TestCase
{

    public function test_it_should_throw_exception_when_there_are_duplicated_values()
    {
        $this->setExpectedException('\RuntimeException');

        Mocks\TestEnumWithDuplicatedValues::getNames();
    }

    public function test_it_should_return_constant_names_when_there_is_no_names_dictionary_in_class()
    {
        $expected = array (
            1 => 'ONE',
            2 => 'TWO',
            3 => 'THREE',
        );
        $actual = Mocks\TestEnum::getNames();

        $this->assertEquals($expected, $actual);
    }

    public function test_it_should_return_dictionary_names_when_there_is_names_dictionary_in_class()
    {
        $expected = array (
            1 => 'One',
            2 => 'Two',
            3 => 'Three',
        );
        $actual = Mocks\TestEnumWithNames::getNames();

        $this->assertEquals($expected, $actual);
    }

    public function test_it_should_return_constant_names_mixed_with_dictionary_names_when_there_is_not_full_dictionary_in_class()
    {
        $expected = array (
            1 => 'One',
            2 => 'TWO',
            3 => 'THREE',
        );
        $actual = Mocks\TestEnumWithSomeNames::getNames();

        $this->assertEquals($expected, $actual);
    }

    public function test_it_should_return_names_for_values_given_in_parameter()
    {
        $expected = array (
            1 => 'ONE',
            3 => 'THREE',
        );
        $actual = Mocks\TestEnum::getNames(array(1,3));

        $this->assertEquals($expected, $actual);
    }

    public function test_it_should_return_exception_when_trying_to_get_names_for_non_existing_value()
    {
        $this->setExpectedException('\Exception');

        Mocks\TestEnum::getNames(array(4));
    }
}

