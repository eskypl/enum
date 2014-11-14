<?php

namespace Esky\Enum\Mocks;

use Esky\Enum\Enum;

class TestEnumWithNames extends Enum
{
    const ONE = 1;
    const TWO = 2;
    const THREE = 3;

    protected static $names = array(
        self::ONE => 'One',
        self::TWO => 'Two',
        self::THREE => 'Three',
    );
}
