<?php

namespace Esky\Enum\Mocks;

use Esky\Enum\Enum;

class TestEnumWithMixedValues extends Enum
{
    const ONE = '1';
    const TWO = '2 two';
    const THREE = 3;
}
