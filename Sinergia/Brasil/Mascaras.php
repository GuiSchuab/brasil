<?php

namespace Sinergia\Brasil;

use Sinergia\Brasil\CNPJ;
use Sinergia\Brasil\CPF;

class Mascaras
{
    /**
     * Retorna o CNPJ no formato 00.000.000/0000-00
     * @param $cnpj
     * @return string
     */
    public static function formataCNPJ($cnpj)
    {
        return CNPJ::formatar($cnpj);
    }

    /**
     * Retorna o CPF no formato 000.000.000-00
     * @param $cpf
     * @return string
     */
    public static function formataCPF($cpf)
    {
        return CPF::formatar($cpf);
    }

    /**
     * Retorna CPF ou CNPJ formatado
     * @param $str
     * @return string
     */
    public static function formataCPFCNPJ($str)
    {
        if (11 == strlen($str)) {
            $str = CPF::formatar($str);
        } elseif (14 == strlen($str)) {
            $str = CNPJ::formatar($str);
        }

        return $str;
    }

    /**
     * Retorna COSIF em seu formato correto
     * @param $cosif
     * @return bool|string
     */
    public static function formataCOSIF($cosif)
    {
        if (8 == strlen($cosif)) {
            $ret = substr($cosif, 0, 1) . '.' . substr($cosif, 1, 1) . '.' . substr($cosif, 2, 1)
                . '.' . substr($cosif, 3, 2) . '.' . substr($cosif, 5, 2) . '-' . substr($cosif, 7, 1);
        } else {
            $ret = false;
        }

        return $ret;
    }

    /**
     * Retorna CMC no formato correto
     * @param $cmc
     * @return string
     */
    public static function formataCMC($cmc)
    {
        $ret = str_pad($cmc, 6, '0', STR_PAD_LEFT);
        return $ret;
    }

    /**
     * Retorna o cep no formato correto
     * @param $cep
     * @return bool|string
     */
    public static function formataCEP($cep)
    {
        if (8 == strlen($cep)) {
            $ret = substr($cep, 0, 2) . '.' . substr($cep, 2, 3) . '-' . substr($cep, 5, 3);
        } else {
            $ret = false;
        }

        return $ret;
    }
}
