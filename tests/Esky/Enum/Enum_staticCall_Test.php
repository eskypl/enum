<?php
/**
 * Created by PhpStorm.
 * User: tk
 * Date: 17.11.14
 * Time: 08:00
 */

namespace Esky\Enum;

use Esky\Enum\Mocks;

class Enum_staticCall_Test extends \PHPUnit_Framework_TestCase
{
    public function test_it_creates_object_by_calling_static_function_named_like_constant()
    {
        $enum = Mocks\TestEnum::ONE();

        $this->assertInstanceOf('Esky\Enum\Mocks\TestEnum', $enum);
        $this->assertEquals($enum->getValue(), Mocks\TestEnum::ONE);
    }

    public function test_it_throws_Exception_by_calling_static_function_witch_name_doesnt_match_any_constant()
    {
        $this->setExpectedException('InvalidArgumentException');

        $enum = Mocks\TestEnum::NON_EXISTS_CONSTANT();
    }
} 