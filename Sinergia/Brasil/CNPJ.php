<?php

namespace Sinergia\Brasil;

/**
 * @see https://github.com/BrazilianFriendsOfSymfony/BFOSBrasilBundle/blob/master/Validator/Constraints/CpfcnpjValidator.php
 * Class CNPJ
 * @package Sinergia\Brasil
 */
class CNPJ
{
    /**
     * Retorna apenas os dígitos do CNPJ
     *
     * @param $cnpj
     * @return string
     */
    public static function digitos($cnpj)
    {
        return substr(preg_replace('![^\d]!', '', $cnpj), 0, 14);
    }

    /**
     * Retorna o cnpj formatado como: 92.122.313/0001-30
     *
     * @param $cnpj
     * @return string
     */
    public static function formatar($cnpj)
    {
        $cnpj = static::digitos($cnpj);
        if (strlen($cnpj) != 14) {
            return "";
        }

        $partes[] = substr($cnpj, 0, 2);
        $partes[] = substr($cnpj, 2, 3);
        $partes[] = substr($cnpj, 5, 3);
        $filiais  = substr($cnpj, 8, 4);
        $verificador = substr($cnpj, 12);

        return implode(".", $partes) . '/' . $filiais . '-' . $verificador;
    }

    /**
     * Retorna os dígitos verificadores (2 últimos dígitos)
     *
     * @param $cnpj
     * @return string
     */
    public static function verificador($cnpj)
    {
        $cnpj = static::formatar($cnpj);

        return substr($cnpj, -2);
    }

    /**
     * Verifica se o CNPJ está no formato: 00.000.000/0000-00
     *
     * @param $cnpj
     * @return bool
     */
    public static function validarFormato($cnpj)
    {
        return preg_match('!\d{2}\.\d{3}\.\d{3}\/\d{4}\-\d{2}!', $cnpj) === 1;
    }
}