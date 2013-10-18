<?php

use Sinergia\Brasil\CPF;

class CPFTest extends PHPUnit_Framework_TestCase
{
    /**
     * Testa o retorno do CPF somente com dígitos.
     */
    public function testDigitos()
    {
        $digitos = CPF::digitos("123.456.789-01");
        $this->assertEquals("12345678901", $digitos);
    }

    /**
     * Testa se o CPF está no formato correto.
     */
    public function testValidarFormato()
    {
        $this->assertTrue(CPF::validarFormato("123.456.789-01"));
        $this->assertFalse(CPF::validarFormato("123.456.79-01"));
    }
}
