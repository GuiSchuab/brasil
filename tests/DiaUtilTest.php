<?php

use Sinergia\Brasil\DateTime\DiaUtil;
use Sinergia\Brasil\DateTime\DateBr;

class DiaUtilTest extends PHPUnit_Framework_TestCase
{
    /**
     * Verifica se a data da pascoa de alguns anos estão corretas
     */
    public function testPascoa()
    {
        $this->assertEquals('31/03/2013', DiaUtil::dataPascoa(new DateBr('22/04/2013 00:00:00'))->dateTimeToString('d/m/Y'));
        $this->assertEquals('20/04/2014', DiaUtil::dataPascoa(new DateBr('30/04/2014 00:00:00'))->dateTimeToString('d/m/Y'));
        $this->assertEquals('05/04/2015', DiaUtil::dataPascoa(new DateBr('10/04/2015 00:00:00'))->dateTimeToString('d/m/Y'));
    }

    /**
     * Verifica se a data da pascoa está sempre no domingo
     */
    public function testSemanaPascoa()
    {
        for ($i = 2000; $i < 2100; $i++) {
            $this->assertEquals(0, DiaUtil::dataPascoa(new DateBr("17/04/$i 00:00:00"))->dateTimeToString('w'));
        }
    }

    /**
     * Verifica se a data da Paixão de cristo está correta
     */
    public function testPaixao()
    {
        $this->assertEquals('03/04/2015', DiaUtil::dataPaixaoCristo(new DateBr('10/09/2015 00:00:00'))->dateTimeToString('d/m/Y'));
        $this->assertEquals('25/03/2016', DiaUtil::dataPaixaoCristo(new DateBr('10/06/2016 00:00:00'))->dateTimeToString('d/m/Y'));
        $this->assertEquals('14/04/2017', DiaUtil::dataPaixaoCristo(new DateBr('10/04/2017 00:00:00'))->dateTimeToString('d/m/Y'));
    }

    /**
     * Verifica se a data da PaixaoCristo está sempre na sexta
     */
    public function testSemanaPaixao()
    {
        for ($i = 2000; $i < 2100; $i++) {
            $this->assertEquals(5, DiaUtil::dataPaixaoCristo(new DateBr("10/04/$i 00:00:00"))->dateTimeToString('w'));
        }
    }

    /**
     * Verifica se a Quarta-Feira de Cinzas está correta
     */
    public function testQuartaCinzas()
    {
        $this->assertEquals('18/02/2015', DiaUtil::dataQuartaCinzas(new DateBr('10/04/2015 00:00:00'))->dateTimeToString('d/m/Y'));
        $this->assertEquals('10/02/2016', DiaUtil::dataQuartaCinzas(new DateBr('23/04/2016 00:00:00'))->dateTimeToString('d/m/Y'));
        $this->assertEquals('01/03/2017', DiaUtil::dataQuartaCinzas(new DateBr('19/04/2017 00:00:00'))->dateTimeToString('d/m/Y'));
    }

    /**
     * Verifica se a data da Quarta-Feira de cinzas está sempre na quarta-feira
     */
    public function testSemanaCinzas()
    {
        for ($i = 2000; $i < 2100; $i++) {
            $this->assertEquals(3, DiaUtil::dataQuartaCinzas(new DateBr("10/04/$i 00:00:00"))->dateTimeToString('w'));
        }
    }

    /**
     * Verifica se a Quarta-Feira de Cinzas está correta
     */
    public function testCorpusChristi()
    {
        $this->assertEquals('04/06/2015', DiaUtil::dataCorpusChristi(new DateBr('15/04/2015 00:00:00'))->dateTimeToString('d/m/Y'));
        $this->assertEquals('26/05/2016', DiaUtil::dataCorpusChristi(new DateBr('10/04/2016 00:00:00'))->dateTimeToString('d/m/Y'));
        $this->assertEquals('15/06/2017', DiaUtil::dataCorpusChristi(new DateBr('21/04/2017 00:00:00'))->dateTimeToString('d/m/Y'));
    }

    /**
     * Verifica se a data da Quarta-Feira de cinzas está sempre na quarta-feira
     */
    public function testSemanaCorpusChristi()
    {
        for ($i = 2000; $i < 2100; $i++) {
            $this->assertEquals(4, DiaUtil::dataCorpusChristi(new DateBr("10/04/$i 00:00:00"))->dateTimeToString('w'));
        }
    }

    /**
     * Verifica se a Quarta-Feira de Cinzas está correta
     */
    public function testCarnaval()
    {
        $this->assertEquals('17/02/2015', DiaUtil::dataCarnaval(new DateBr('25/09/2015 00:00:00'))->dateTimeToString('d/m/Y'));
        $this->assertEquals('09/02/2016', DiaUtil::dataCarnaval(new DateBr('10/04/2016 00:00:00'))->dateTimeToString('d/m/Y'));
        $this->assertEquals('28/02/2017', DiaUtil::dataCarnaval(new DateBr('05/04/2017 00:00:00'))->dateTimeToString('d/m/Y'));
    }

    /**
     * Verifica se a data da Quarta-Feira de cinzas está sempre na quarta-feira
     */
    public function testSemanaCarnaval()
    {
        for ($i = 2000; $i < 2100; $i++) {
            $this->assertEquals(2, DiaUtil::dataCarnaval(new DateBr("10/04/$i 00:00:00"))->dateTimeToString('w'));
        }
    }

    /**
     * Verifica se a data passada é fim de semana
     */
    public function testWeekend()
    {
        $this->assertTrue(DiaUtil::isWeekend(new DateBr('26/10/2013 00:00:00')));
        $this->assertFalse(DiaUtil::isWeekend(new DateBr('25/10/2013 00:00:00')));
    }

    /**
     * Verifica se as datas passadas são feriado
     */
    public function testFeriado()
    {
        $this->assertTrue(DiaUtil::isFeriado(new DateBr('01/01/2013 00:00:00')));
        $this->assertTrue(DiaUtil::isFeriado(new DateBr('21/04/2013 00:00:00')));
        $this->assertTrue(DiaUtil::isFeriado(new DateBr('01/05/2013 00:00:00')));
        $this->assertTrue(DiaUtil::isFeriado(new DateBr('07/09/2013 00:00:00')));
        $this->assertTrue(DiaUtil::isFeriado(new DateBr('12/10/2013 00:00:00')));
        $this->assertTrue(DiaUtil::isFeriado(new DateBr('02/11/2013 00:00:00')));
        $this->assertTrue(DiaUtil::isFeriado(new DateBr('15/11/2013 00:00:00')));
        $this->assertTrue(DiaUtil::isFeriado(new DateBr('25/12/2013 00:00:00')));
    }
}
