<?php

namespace Esky\Enum;

use Esky\Enum\Mocks;

class Enum_getName_Test extends \PHPUnit_Framework_TestCase
{
    public function test_it_should_return_constant_name_where_there_is_no_name_in_dictionary()
    {
        $enum = new Mocks\TestEnumWithSomeNames(2);

        $this->assertEquals('TWO', $enum->getName());
    }

    public function test_it_should_return_dictionary_name_where_there_is_name_in_dictionary()
    {
        $enum = new Mocks\TestEnumWithSomeNames(1);

        $this->assertEquals('One', $enum->getName());
    }
}
