<?php

namespace Sinergia\Brasil\DateTime;

use Paliari\DateTime\TDateTime;

class DateTimeBr extends TDateTime
{
    /**
     * Se o time for string ele aceita o formato DateTimeBr (d/m/Y H:i:s |d/m/YTH:i:s), não aceita formato americano (m/d/Y H:i:s)
     *
     * @param string|int          $time
     * @param DateTimeZone|string $tz
     */
    public function __construct($time = null, $tz = null)
    {

        if (is_numeric($time)) {
            $time = date('Y-m-d H:i:s', $time);
        } elseif (is_string($time)) {
            $time = static::strBrToUs($time);

        }

        return parent::__construct($time, $tz);
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
        $expreg = '/^(0[1-9]|[1-2][0-9]|3[0-1])\/(0[1-9]|1[0-2])\/(\d{4})(T| ){0,1}(([0-1][0-9]|[2][0-3]):([0-5][0-9]):([0-5][0-9])){0,1}$/';
        if (preg_match($expreg, $date, $datebit)) {
            @list($tudo, $dia, $mes, $ano, $tz, $time, $hora, $min, $seg) = $datebit;

            return "$ano-$mes-$dia" . ($hora | $min | $seg ? "$hora:$min:$seg" : "");
        }

        return $date;
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

    /**
     * Retorna uma string com a data por extenso.
     *
     * @param int $param
     *
     * @return string
     */
    public function dataExtenso($param = 1)
    {
        return DataExtenso::formatar($param, $this->getTimestamp());
    }
}
