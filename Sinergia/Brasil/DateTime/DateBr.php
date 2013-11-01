<?php

namespace Sinergia\Brasil\DateTime;

/**
 * Class DateBr
 * @package Sinergia\Brasil\DateTime
 */
class DateBr extends DateTimeBr
{
    /**
     * Se o time for string ele aceita o formato DateBr (d/m/Y), não aceita formato americano (m/d/Y H:i:s)
     * @param string|int          $time
     * @param DateTimeZone|string $tz
     */
    public function __construct($time = null, $tz = null)
    {
        if (is_numeric($time)) {
            $time = date('Y-m-d', $time);
        } else {
            $time = DateTimeBr::strBrToUs($time);
        }

        return parent::__construct($time, $tz);
    }

    /**
     * Utilizado pelo construtor da classe
     * @param $date
     * @return int
     */
    protected function strBrToUs($date)
    {
        if (preg_match('/^(0[1-9]|[1-2][0-9]|3[0-1])\/(0[1-9]|1[0-2])\/(\d{4})(T| ){0,1}(([0-1][0-9]|[2][0-3]):([0-5][0-9]):([0-5][0-9])){0,1}$/', $date, $datebit)) {
            @list($tudo, $dia, $mes, $ano, $tz, $time, $hora, $min, $seg) = $datebit;

            return "$ano-$mes-$dia";// . ($hora | $min | $seg ? "$hora:$min:$seg" : "");
        }

        return $date;
    }

} 