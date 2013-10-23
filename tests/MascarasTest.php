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

    /**
     * Testa o retorno do CPF no formato 123.456.789-01
     * Caso o CPF tenha menos de 11 dígitos retorna vazio,
     * caso maior retorna os 11 primeiro dígitos formatados
     */
    public function testCPF()
    {
        $this->assertEquals("123.456.789-01", Mascaras::formataCPF("123456.789-01"));
        $this->assertEquals("", Mascaras::formataCPF("12345789-01"));
        $this->assertEquals("", Mascaras::formataCPF("12345701"));
        $this->assertEquals("142.345.367-83", Mascaras::formataCPF("1423.4536.7839-901"));
        $this->assertEquals("", Mascaras::formataCPF("14A.536.839-91"));
        $this->assertEquals(14, strlen(Mascaras::formataCPF("142.453.739-90")));
    }

    /**
     * Testa o retorno do CPF/CNPJ
     */
    public function testCPFCNPJ()
    {
        $this->assertEquals("92.122.313/0001-30", Mascaras::formataCPFCNPJ("9212-2313000130"));
        $this->assertEquals("92.122.313/0001-53", Mascaras::formataCPFCNPJ("92122313teste0001530"));
        $this->assertEquals("", Mascaras::formataCPFCNPJ("921223130"));
    }
}
