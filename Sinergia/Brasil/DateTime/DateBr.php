<?php

namespace Sinergia\Brasil\DateTime;

/**
 * Class DateBr
 * @package Sinergia\Brasil\DateTime
 */
class DateBr extends DateTimeBr
{
    protected function init()
    {
        $this->setHour(0)->setMinute(0)->setSecond(0);
    }
}
