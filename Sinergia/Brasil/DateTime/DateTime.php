<?php

namespace Sinergia\Brasil\DateTime;

use Carbon\Carbon;

class DateTime extends Carbon
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

    /**
     * Converte uma timestamp para string formatada, no formato do php tradicional ex: 'd/m/Y' ou 'Y-m-d H:i:s'.
     *
     * @param timestamp $date
     * @param string $format
     *
     * @return string
     */
    public static function dateTimeToString($date, $format = 'Y-m-d H:i:')
    {
        return date($format, $date);
    }
}
