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
}