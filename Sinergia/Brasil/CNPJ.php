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
        $cpf = static::digitos($cnpj);
        if (strlen($cnpj) != 14) {
            return "";
        }

        $partes[] = substr($cnpj, 0, 2);
        $partes[] = substr($cnpj, 3, 3);
        $partes[] = substr($cnpj, 6, 3);
        $filiais  = substr($cnpj, 9, 4);
        $verificador = substr($cnpj, 13);

        return implode(".", $partes) . '/' . $filiais . '-' . $verificador;
    }
}