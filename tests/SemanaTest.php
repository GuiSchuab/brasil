<?php

use Sinergia\Brasil\Semana;

class SemanaTest extends PHPUnit_Framework_TestCase
{
    /**
     * Testa se o array tem realmente 7 posições;
     */
    public function testCountSiglas()
    {
        $this->assertCount(7, Semana::$SIGLAS);
    }

    /**
     * Testa se o array tem realmente 7 posições;
     */
    public function testCountNomes()
    {
        $this->assertCount(7, Semana::$NOMES);
    }
}