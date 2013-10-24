<?php

namespace Sinergia\Brasil\DateTime;

use Sinergia\Brasil\Semana;
use Sinergia\Brasil\Mes;

class DateTime
{
    protected static $timestamp;

    /**
     * Retorna a data convertida em timestamp
     * @param string $data
     * @return timestamp
     */
    protected static function getTimeStamp($data)
    {
        static::$timestamp = strtotime($data);
        return static::$timestamp;
    }

    /**
     * Formato de data a ser passada: string
     *      Y-m-d H:i:s
     *      YmdHis
     *      m/d/Y H:i:s
     * Formato do retorno:
     *  1: semana, dia de mes de ano,
     *  2: para dia de mes de ano
     *  3: para semana, dia de mes de ano as hora:minuto:segundos
     *  4: dia de mes de ano as hora:minuto:segundos
     * @param string $data
     * @param int $tp
     * @return string
     */
    public static function dataExtensa($data = '', $tp)
    {
        if ('' == $data) {
            $data = time();
        }

        $data = static::getTimeStamp($data);

        $sem = Semana::$NOMESF[date("N", $data)];
        $mes = Mes::$NOMES[date("m", $data)];

        switch ($tp) {
            case 1 : return $sem . ", " . date("d", $data) . " de " . $mes . " de " . date("Y", $data);
            case 2 : return date("d",$data) . " de " . $mes . " de " . date("Y",$data);
            case 3 : return $sem . ", " . date("d", $data) . " de " . $mes . " de " . date("Y", $data) . " as " .  date("H:i:s", $data);
            case 4 : return date("d", $data) . " de " . $mes . " de " . date("Y", $data) . " as " . date("H:i:s", $data);
            default : return $sem . ", " . date("d", $data) . " de " . $mes . " de " . date("Y", $data);
        }
    }
}
