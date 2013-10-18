<?php

use Sinergia\Brasil\UF;

class UFTest extends PHPUnit_Framework_TestCase
{
    /**
     * Testa se o array tem realmente 27 posições;
     */
    public function testCountSiglas()
    {
        $this->assertCount(27, UF::$SIGLAS);
    }

    /**
     * Testa se o array tem realmente 27 estados;
     */
    public function testCountNomes()
    {
        $this->assertCount(27, UF::$NOMES);
    }

    /**
     * Testa se o array tem realmente 5 regioes;
     */
    public function testCountRegioes()
    {
        $this->assertCount(5, UF::$REGIOES);
    }

    /**
     * Testa se todas as regioes contem 27 posições
     */
    public function testCountUfRegioes()
    {
        $i = 0;
        foreach (UF::$REGIOES as $k => $v) {
            foreach (UF::$REGIOES[$k] as $val) {
                $i++;
            }
        }
        $this->assertEquals(27, $i);
    }

    /**
     * Testa se os valores das siglas estão corretos, cada qual com sua chave
     */
    public function testChaveValor()
    {
        foreach (UF::$SIGLAS as $k => $v) {
            $this->assertEquals($k, $v);
        }
    }
}
