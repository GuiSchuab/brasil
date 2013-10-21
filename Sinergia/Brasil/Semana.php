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
        '01' => 'segunda-feira',
        '02' => 'terça-feira',
        '03' => 'quarta-feira',
        '04' => 'quinta-feira',
        '05' => 'sexta-feira',
        '06' => 'sábado',
        '07' => 'domingo'
    );

    /**
     * @var array
     * Siglas dos 7 dias da semana
     */
    public static $SIGLAS = array (
        '01' => 'SEG',
        '02' => 'TER',
        '03' => 'QUA',
        '04' => 'QUI',
        '05' => 'SEX',
        '06' => 'SAB',
        '07' => 'DOM'
    );
}