<?php

namespace Sinergia\Brasil\DateTime;

use Sinergia\Brasil\Semana;
use Sinergia\Brasil\Mes;

class DataExtenso
{
    const SEMANA_DIA_MES_ANO = 1;
    const DIA_MES_ANO = 2;
    const SEMANA_DIA_MES_ANO_HORA = 3;
    const DIA_MES_ANO_HORA = 4;

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
     * @param int $tp
     * @param int $data
     * @return string
     * @throws \DomainException
     */
    public static function formatar($tp = 1, $data = 0)
    {
        if (0 == $data) {
            $data = time();
        }

        $sem = Semana::$NOMESF[date("N", $data)];
        $mes = Mes::$NOMES[date("m", $data)];

        switch ($tp) {
            case 1: return $sem . ", " . date("d", $data) . " de " . $mes . " de " . date("Y", $data);
            case 2: return date("d",$data) . " de " . $mes . " de " . date("Y",$data);
            case 3: return $sem . ", " . date("d", $data) . " de " . $mes . " de " . date("Y", $data) . " as " .  date("H:i:s", $data);
            case 4: return date("d", $data) . " de " . $mes . " de " . date("Y", $data) . " as " . date("H:i:s", $data);
            default: throw new \DomainException("Tipo '$tp' inváldo. Utilize as constantes disponíveis na classe.");
        }
    }
}