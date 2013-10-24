<?php

namespace Sinergia\Brasil\DateTime;

use Sinergia\Brasil\Semana;
use Sinergia\Brasil\Mes;

class DateTime
{
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
     * @param int $data
     * @param int $tp
     * @return string
     */
    public static function dataExtensa($data = 0, $tp)
    {
        if (0 == $data) {
            $data = time();
        }

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
