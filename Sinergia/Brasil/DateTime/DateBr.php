<?php

namespace Sinergia\Brasil\DateTime;

use Paliari\DateTime\TDate;

/**
 * Class DateBr
 * @package Sinergia\Brasil\DateTime
 */
class DateBr extends TDate
{
    /**
     * Se o time for string ele aceita o formato DateBr (d/m/Y), não aceita formato americano (m/d/Y)
     *
     * @param string|int          $date
     * @param DateTimeZone|string $tz
     */
    public function __construct($date = null, $tz = null)
    {
        if (is_numeric($date)) {
            $date = date('Y-m-d', $date);
        } elseif (is_string($date)) {
            $date = static::strBrToUs($date);
        }
        return parent::__construct($date, $tz);
    }

    /**
     * Utilizado pelo construtor da classe
     *
     * @param $date
     *
     * @return int
     */
    protected function strBrToUs($date)
    {
        $regexp = '/^(0[1-9]|[1-2][0-9]|3[0-1])\/(0[1-9]|1[0-2])\/(\d{4})(T| ){0,1}(([0-1][0-9]|[2][0-3]):([0-5][0-9]):([0-5][0-9])){0,1}$/';
        if (preg_match($regexp, $date, $datebit)) {
            @list($tudo, $dia, $mes, $ano, $tz) = $datebit;

            return "$ano-$mes-$dia";
        }

        return $date;
    }
}
