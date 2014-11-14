<?php

namespace Esky\Enum\Mocks;

use Esky\Enum\Enum;

class TestEnumWithDuplicatedValues extends Enum
{
    const ONE = 1;
    const SECOND_ONE = 1;
    const TWO = 2;
}
