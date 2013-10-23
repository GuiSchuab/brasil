<?php

use Sinergia\Brasil\ValorExtenso;

class ValoerExtensoTest extends PHPUnit_Framework_TestCase
{
    public function testValorExtenso()
    {
        //$result = "cinco reais";
        echo ValorExtenso::valorExtenso(5.3, true);
        //$this->assertEquals($result, ValorExtenso::valorExtenso(5));
    }
}