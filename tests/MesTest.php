<?php

use Sinergia\Brasil\Mes;

class MesTest extends PHPUnit_Framework_TestCase
{
    /**
     * Testa se o array tem realmente 12 posições;
     */
    public function testCountSiglas()
    {
        $this->assertCount(12, Mes::$SIGLAS);
    }

    /**
     * Testa se as siglas correspondem com as iniciais dos nomes
     */
    public function testNomeSigla()
    {
        foreach (Mes::$NOMES as $k => $v) {
            $this->assertEquals(Mes::$SIGLAS[$k], substr($v, 0, 3));
        }
    }
}