<?php

namespace Sinergia\Brasil\DateTime;

use Carbon\Carbon;

class DateBr extends Carbon
{
    /**
     * Se o time for string ele aceita o formato DateBr (d/m/Y H:i:s |d/m/YTH:i:s), não aceita formato americano (m/d/Y H:i:s)
     * @param string|int $time
     * @param DateTimeZone|string $tz
     */
    public function __construct($time = null, $tz = null)
    {
        if (is_string($time)) {
            $time = DateBr::strBrToTimestamp($time);
        }
        return parent::__construct($time, $tz);
    }

    protected function strBrToTimestamp($date)
    {
        if (preg_match('/^(0[1-9]|[1-2][0-9]|3[0-1])\/([0-1][0-2])\/(\d{4})(T| ){0,1}(([0-1][0-9]|[2][0-3]):([0-5][0-9]):([0-5][0-9])){0,1}$/', $date, $datebit)) {
            $ano = $datebit[3];
            $mes = $datebit[2];
            $dia = $datebit[1];
            $hora = $datebit[6];
            $min = $datebit[7];
            $seg = $datebit[8];
            return mktime($hora, $min, $seg, $mes, $dia, $ano);
        }
        return $date;
    }

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
     * @param DateBr|timestamp $date
     * @param string           $format
     *
     * @return string
     */
    public static function dateTimeToString($date, $format = 'Y-m-d H:i:s')
    {
        if ($date instanceof DateBr) {
            $date = strtotime($date);
        }

        return date($format, $date);
    }

    /**
     * Ao fazer um 'echo' na data, a função permite imprimir como se fosse uma string
     * @return string
     */
    public function __toString()
    {
        $format = ($this->hour || $this->minute || $this->second) ? 'd/m/Y H:i:s' : 'd/m/Y';

        return $this->format($format);
    }
}
