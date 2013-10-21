<?php

namespace Sinergia\Brasil;

/**
 * Class Mes
 * @package Sinergia\Brasil

 * dias da semana
 * dias da semana abreviado
 *
 */

class Mes
{
    /**
     * @var array
     * 12 meses com o nome
     */
    public static $NOMES = array (
        '01'=>'Janeiro',
        '02'=>'Fevereiro',
        '03'=>'Março',
        '04'=>'Abril',
        '05'=>'Maio',
        '06'=>'Junho',
        '07'=>'Julho',
        '08'=>'Agosto',
        '09'=>'Setembro',
        '10'=>'Outubro',
        '11'=>'Novembro',
        '12'=>'Dezembro'
    );

    /**
     * @var array
     * 12 meses com a sigla
     */
    public static $SIGLAS = array (
        '01'=>'JAN',
        '02'=>'FEV',
        '03'=>'MAR',
        '04'=>'ABR',
        '05'=>'MAI',
        '06'=>'JUN',
        '07'=>'JUL',
        '08'=>'AGO',
        '09'=>'SET',
        '10'=>'OUT',
        '11'=>'NOV',
        '12'=>'DEZ'
    );
}