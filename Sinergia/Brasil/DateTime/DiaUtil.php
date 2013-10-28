<?php

namespace Sinergia\Brasil\DateTime;

class DiaUtil
{
    /**
     * Variável que armazena função que verifica os feriados variáveis que ficam salvos no Banco de Dados
     * @var function
     */
    protected static $feriado_handler;

    /**
     * @var DateBr
     */
    protected static $pascoa;

    /**
     * Array com os feriados nacionais fixos
     * @var array
     */
    protected static $feriados_nacionais = array (
        '0101',
        '0501',
        '0907',
        '1012',
        '1102',
        '1115',
        '1225',
    );

    /**
     * Retorna um DateBr com o dia da páscoa do ano da data informada
     * @param  DateBr           $date
     * @return DateBr
     * @throws \DomainException
     */
    public static function dataPascoa($date)
    {
        if (!$date instanceof DateBr) {
            throw new \DomainException("Tipo '$date' inváldo. Utilize DateBr.");
        }
        $ano = @$date->year;
        if ($ano == static::$pascoa->year) {
            return static::$pascoa;
        }
        $c = floor($ano / 100);
        $n = $ano - (19 * floor($ano / 19));
        $k = floor(($c - 17) / 25);
        $i = $c - floor($c / 4) - floor(($c - $k) / 3) + (19 * $n) + 15;
        $i = $i - (30 * floor($i / 30));
        $i = $i - (floor($i / 28) * (1 - floor($i / 28)) * floor(29 / ($i + 1)) * floor((21 - $n) / 11));
        $j = $ano + floor($ano / 4) + $i + 2 -$c + floor($c / 4);
        $j = $j - (7 * floor($j / 7));
        $L = $i - $j;
        $mes = 3 + floor(($L + 40) / 44);
        $dia = $L + 28 - (31 * floor($mes / 4));
        static::$pascoa = DateBr::createFromDate($ano, $mes, $dia);

        return static::$pascoa;
    }

    /**
     * Retorna um DateBr com o dia da Paixão de Cristo do ano da data passada.
     * @param  DateBr         $date
     * @return \Carbon\Carbon DateBr
     */
    public static function dataPaixaoCristo($date)
    {
       return static::dataPascoa($date)->subDays(2);
    }

    /**
     * Retorna um DateBr com o dia da Quarta-feira de Cinzas do ano da data passada.
     * @param $date
     * @return \Carbon\Carbon DateBr
     */
    public static function dataQuartaCinzas($date)
    {
        return static::dataPascoa($date)->subDays(46);
    }

    /**
     * Retorna um DateBr com o dia de Corpus Christi do ano da data passada.
     * @param $date
     * @return \Carbon\Carbon DateBr
     */
    public static function dataCorpusChristi($date)
    {
        return static::dataPascoa($date)->addDays(60);
    }

    /**
     * Retorna um DateBr com o dia do Domingo de Ramos do ano da data passada.
     * @param $date
     * @return \Carbon\Carbon DataBr
     */
    public static function dataDomingoRamos($date)
    {
        return static::dataPascoa($date)->subDays(7);
    }

    /**
     * Retorna um DateBr com o dia da terça-feira de carnaval do ano da data passada.
     * @param $date
     * @return \Carbon\Carbon DateBr
     */
    public static function dataCarnaval($date)
    {
        return static::dataPascoa($date)->subDays(47);
    }

    /**
     * Retorna o póximo dia útil, se a data passsada for útil, retorna ela mesma.
     * @param  DateBr $datref
     * @return string
     */
    public static function proxDiaUtil($datref)
    {
       return static::diaUtil($datref, 1);
    }

    /**
     * Retorna o dia útil anterior, se a data passsada for útil, retorna ela mesma.
     * @param  DateBr $datref
     * @return DateBr
     */
    public static function anteriorDiaUtil($datref)
    {
        return static::diaUtil($datref, -1);
    }

    /**
     * Retorna o dia útil de acordo com a data e o parâmetro passado.
     * Se a data passsada for útil, retorna ela mesma.
     *   1 - Próximo dia útil
     *  -1 - Anterior dia útil
     * @param  DateBr           $datref
     * @param  integer          $param
     * @return DateBr
     * @throws \DomainException
     */
    protected static function diaUtil($datref, $param)
    {
        if (!$datref instanceof DateBr) {
            throw new \DomainException("Tipo '$datref' inváldo. Utilize DateBr.");
        }
        while (static::isWeekend($datref) || static::isFeriado($datref)) {
            $datref->addDays($param);
        }

        return $datref;
    }

    /**
     * Verifica se a data passada é feriado
     * @param  DateBr $datref
     * @return bool
     */
    public static function isFeriado($datref)
    {
        if (static::isCarnaval($datref) ||
            static::isQuartaCinzas($datref) ||
            static::isCorpusChristi($datref) ||
            static::isPascoa($datref) ||
            static::isPaixao($datref) ||
            static::isFeriadoNacional($datref) ||
            static::isOther($datref)) {
            return true;
        } else {
            return false;
        }
    }

    /**
     * Verifica se é final de semana
     * @param  DateBr $datref
     * @return bool
     */
    protected static function isWeekend($datref)
    {
        return ($datref->dayOfWeek < 1 || $datref->dayOfWeek > 5);
    }

    /**
     * Verifica se a data passada por parâmetro é Páscoa
     * @param  DateBr $datref
     * @return bool
     */
    protected static function isPascoa($datref)
    {
        return $datref == static::dataPascoa($datref);
    }

    /**
     * Verifica se a data passada por parâmetro é Paixão de Cristo
     * @param  DateBr $datref
     * @return bool
     */
    protected static function isPaixao($datref)
    {
        return $datref == static::dataPaixaoCristo($datref);
    }

    /**
     * Verifica se a data é um feriado nacional
     * @param  DateBr $datref
     * @return bool
     */
    protected static function isFeriadoNacional($datref)
    {
       return in_array($datref->month . $datref->day, @static::$feriados_nacionais);
    }

    /**
     * Verifica se a data passada é Corpus Christi
     * @param  DateBr $datref
     * @return bool
     */
    protected static function isCorpusChristi($datref)
    {
        return $datref == static::dataCorpusChristi($datref);
    }

    /**
     * Verifica se a data passada é Quarta-feira de Cinzas
     * @param  DateBr $datref
     * @return bool
     */
    protected static function isQuartaCinzas($datref)
    {
        return $datref == static::dataQuartaCinzas($datref);
    }

    /**
     * Verifica se a data passada é carnaval
     * @param  DateBr $datref
     * @return bool
     */
    protected static function isCarnaval($datref)
    {
        return $datref == static::dataCarnaval($datref);
    }

    /**
     * @param $datref
     * @return bool|mixed
     */
    protected static function isOther($datref)
    {
        $return = false;
        if ( is_callable(static::$feriado_handler) ) {
            $return = call_user_func(static::$feriado_handler, $datref);
        }

        return $return;
    }

    /**
     * Seta feriado à variável
     * @param $feriado_handler
     */
    public static function setFeriadoHandler($feriado_handler)
    {
       static::$feriado_handler = $feriado_handler;
    }
}
