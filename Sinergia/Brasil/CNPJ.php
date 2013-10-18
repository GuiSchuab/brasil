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
}