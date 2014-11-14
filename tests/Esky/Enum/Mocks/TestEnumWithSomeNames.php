<?php

namespace Esky\Enum\Mocks;

use Esky\Enum\Enum;

class TestEnumWithSomeNames extends Enum
{
    const ONE = 1;
    const TWO = 2;
    const THREE = 3;

    protected static $names = array(
        self::ONE => 'One',
    );
}
