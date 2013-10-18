<?php

use Sinergia\Brasil\CPF;

class CPFTest extends PHPUnit_Framework_TestCase
{
    public function testDigitos()
    {
        $digitos = CPF::digitos("123.456.789-01");
        $this->assertEquals("12345678901", $digitos);
    }

    public function testFormato()
    {
        $this->assertTrue(CPF::validarFormato("123.456.789-01"));
        $this->assertFalse(CPF::validarFormato("123.456.79-01"));
    }
}
