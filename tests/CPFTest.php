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

    /**
     * Testa o retorno do CPF no formato 123.456.789-01
     * Caso o CPF tenha menos de 11 dígitos retorna vazio,
     * caso maior retorna os 11 primeiro dígitos formatados
     */
    public function testFormatar()
    {
        $cpfFormatado = CPF::formatar("123456.789-01");
        $this->assertEquals("123.456.789-01", $cpfFormatado);

        $cpfFormatado = CPF::formatar("12345789-01");
        $this->assertEquals("", $cpfFormatado);

        $cpfFormatado = CPF::formatar("12345701");
        $this->assertEquals("", $cpfFormatado);

        $cpfFormatado = CPF::formatar("1423.4536.7839-901");
        $this->assertEquals("142.345.367-83", $cpfFormatado);

        $cpfFormatado = CPF::formatar("14A.536.839-91");
        $this->assertEquals("", $cpfFormatado);
    }
}
