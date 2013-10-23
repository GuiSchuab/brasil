<?php

use Sinergia\Brasil\Mascaras;

class MascarasTest extends PHPUnit_Framework_TestCase
{
    /**
     * Testa o retorno do CNPJ no formato 00.000.000/0000-00
     * Caso o CNPJ informado tenha menos de 14 dígitos retorna vazio,
     * caso maior retorna os 14 primeiro dígitos formatados
     */
    public function testCNPJ()
    {
        $this->assertEquals("92.122.313/0001-30", Mascaras::formataCNPJ("9212-2313000130"));
        $this->assertEquals("92.122.313/0001-53", Mascaras::formataCNPJ("92122313teste0001530"));
        $this->assertEquals("", Mascaras::formataCNPJ("921223130"));
    }
}
