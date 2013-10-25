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
        if (!$value) {
            return NULL;
        }
        return date('Y-m-d\TH:i:s', $value);
    }

    /**
     * Converte uma timestamp para determinado valor para formato do XML padrao ABRASF
     *
     * @param timestamp $date
     *
     * @return string
     */
    public static function dateToXMLValue($date)
    {
        if (!$date) {
            return NULL;
        }
        return date('Y-m-d', $date);
    }
}
