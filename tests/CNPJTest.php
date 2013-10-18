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
}
