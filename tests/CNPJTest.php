<?php

use Sinergia\Brasil\CNPJ;

class CNPJTest extends PHPUnit_Framework_TestCase
{
    /**
     * Teste que retorna somente os dígitos od cnpj.
     */
    public function testDigitos()
    {
        $digitos = CNPJ::digitos("92.122.313/0001-30");
        $this->assertEquals("92122313000130", $digitos);
        $digitos = CNPJ::digitos("92.12s2.313/0e001-30");
        $this->assertEquals("92122313000130", $digitos);
    }

    /**
     * Testa o retorno do CNPJ no formato 00.000.000/0000-00
     * Caso o CNPJ informado tenha menos de 14 dígitos retorna vazio,
     * caso maior retorna os 14 primeiro dígitos formatados
     */
    public function testFormatar()
    {
        $cnpjFormatado = CNPJ::formatar("9212-2313000130");
        $this->assertEquals("92.122.313/0001-30", $cnpjFormatado);

        $cnpjFormatado = CNPJ::formatar("92122313teste0001530");
        $this->assertEquals("92.122.313/0001-53", $cnpjFormatado);

        $cnpjFormatado = CNPJ::formatar("921223130");
        $this->assertEquals("", $cnpjFormatado);
    }
}
