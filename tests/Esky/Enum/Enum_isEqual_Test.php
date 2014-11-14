<?php

namespace Esky\Enum;

use Esky\Enum\Mocks;

class Enum_isEqual_Test extends \PHPUnit_Framework_TestCase
{
    public function test_it_returns_true_when_enum_with_the_same_value_is_passed()
    {
        $one = new Mocks\TestEnum(Mocks\TestEnum::ONE);
        $secondOne = new Mocks\TestEnum(Mocks\TestEnum::ONE);

        $equal = $one->isEqual($secondOne);

        $this->assertTrue($equal);
    }

    public function test_it_returns_false_when_enum_with_different_value_is_passed()
    {
        $one = new Mocks\TestEnum(Mocks\TestEnum::ONE);
        $secondOne = new Mocks\TestEnum(Mocks\TestEnum::ONE);

        $equal = $one->isEqual($secondOne);

        $this->assertTrue($equal);
    }

    public function test_it_returns_true_when_basic_type_with_the_same_value_is_passed()
    {
        $one = new Mocks\TestEnum(Mocks\TestEnum::ONE);
        $value = Mocks\TestEnum::TWO;

        $equal = $one->isEqual($value);

        $this->assertFalse($equal);
    }

    public function test_it_returns_false_when_basic_type_with_different_value_is_passed()
    {
        $one = new Mocks\TestEnum(Mocks\TestEnum::ONE);
        $value = Mocks\TestEnum::TWO;

        $equal = $one->isEqual($value);

        $this->assertFalse($equal);
    }
}