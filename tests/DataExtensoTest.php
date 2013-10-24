<?php

use Sinergia\Brasil\DateTime\DataExtenso;

class DataExtensoTest extends PHPUnit_Framework_TestCase
{
    /**
     * Verifica se a data rotorna por extenso corretamente.
     */
    public function testDiaMesAno()
    {
        $this->assertEquals('25 de outubro de 2013', DataExtenso::formatar(DataExtenso::DIA_MES_ANO, strtotime('2013-10-25 11:30:01')));
        $this->assertEquals('25 de outubro de 2013', DataExtenso::formatar(DataExtenso::DIA_MES_ANO, strtotime('20131025113001')));
        $this->assertEquals('25 de outubro de 2013', DataExtenso::formatar(DataExtenso::DIA_MES_ANO, strtotime('10/25/2013 11:30:01')));
    }

    /**
     * Verifica se a data rotorna por extenso corretamente.
     */
    public function testSemanaDiaMesAno()
    {
        $this->assertEquals('sexta-feira, 25 de outubro de 2013', DataExtenso::formatar(DataExtenso::SEMANA_DIA_MES_ANO, strtotime('2013-10-25 11:30:01')));
        $this->assertEquals('sexta-feira, 25 de outubro de 2013', DataExtenso::formatar(DataExtenso::SEMANA_DIA_MES_ANO, strtotime('20131025113001')));
        $this->assertEquals('sexta-feira, 25 de outubro de 2013', DataExtenso::formatar(DataExtenso::SEMANA_DIA_MES_ANO, strtotime('10/25/2013 11:30:01')));
    }

    /**
     * Verifica se a data rotorna por extenso corretamente.
     */
    public function testDiaMesAnoHora()
    {
        $this->assertEquals('25 de outubro de 2013 as 11:30:01', DataExtenso::formatar(DataExtenso::DIA_MES_ANO_HORA, strtotime('2013-10-25 11:30:01')));
        $this->assertEquals('25 de outubro de 2013 as 11:30:01', DataExtenso::formatar(DataExtenso::DIA_MES_ANO_HORA, strtotime('20131025113001')));
        $this->assertEquals('25 de outubro de 2013 as 11:30:01', DataExtenso::formatar(DataExtenso::DIA_MES_ANO_HORA, strtotime('10/25/2013 11:30:01')));
    }

    /**
     * Verifica se a data rotorna por extenso corretamente.
     */
    public function testSemanaDiaMesAnoHora()
    {
        $this->assertEquals('sexta-feira, 25 de outubro de 2013 as 11:30:01', DataExtenso::formatar(DataExtenso::SEMANA_DIA_MES_ANO_HORA, strtotime('2013-10-25 11:30:01')));
        $this->assertEquals('sexta-feira, 25 de outubro de 2013 as 11:30:01', DataExtenso::formatar(DataExtenso::SEMANA_DIA_MES_ANO_HORA, strtotime('20131025113001')));
        $this->assertEquals('sexta-feira, 25 de outubro de 2013 as 11:30:01', DataExtenso::formatar(DataExtenso::SEMANA_DIA_MES_ANO_HORA, strtotime('10/25/2013 11:30:01')));
    }
}
