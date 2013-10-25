<?php

namespace Sinergia\Brasil\DateTime;

class DateTime
{
    /**
     * Converte um timestamp para determinado valor para formato do XML padrao ABRASF
     *
     * @param timestamp $value
     *
     * @return string
     */
    public static function dateTimeToXMLValue($value)
    {
        return date('Y-m-d\TH:i:s', $value);
    }
}
