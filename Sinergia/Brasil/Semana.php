<?php

namespace Sinergia\Brasil;

/**
 * Class Semana
 * @package Sinergia\Brasil
 */
class Semana
{
    /**
     * @var array
     * Nomes dos 7 dias da semana
     */
    public static $NOMES = array (
        '01' => 'segunda',
        '02' => 'terça',
        '03' => 'quarta',
        '04' => 'quinta',
        '05' => 'sexta',
        '06' => 'sábado',
        '07' => 'domingo'
    );

    /**
     * @var array
     * Siglas dos 7 dias da semana
     */
    public static $SIGLAS = array (
        '01' => 'seg',
        '02' => 'ter',
        '03' => 'qua',
        '04' => 'qui',
        '05' => 'sex',
        '06' => 'sab',
        '07' => 'dom'
    );
}