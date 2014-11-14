<?php

namespace Esky\Enum;

use Esky\Enum\Mocks;

class Enum_isValidValue_Test extends \PHPUnit_Framework_TestCase
{

    public function test_it_should_return_true_for_a_proper_value()
    {
        $isValid = Mocks\TestEnumWithMixedValues::isValidValue('1');

        $this->assertTrue($isValid);
    }

    public function test_it_should_return_true_for_a_proper_value_but_with_different_type()
    {
        $isValid = Mocks\TestEnumWithMixedValues::isValidValue(1);

        $this->assertTrue($isValid);
    }

    public function test_it_should_return_false_for_type_juggling_in_string_with_letters()
    {
        $two = (int)Mocks\TestEnumWithMixedValues::TWO;
        $isValid = Mocks\TestEnumWithMixedValues::isValidValue($two);

        $this->assertFalse($isValid);
    }

    public function test_it_should_return_false_for_a_non_exiting_value()
    {
        $isValid = Mocks\TestEnumWithMixedValues::isValidValue(4);

        $this->assertFalse($isValid);
    }
}
