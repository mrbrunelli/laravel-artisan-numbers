<?php

namespace App\Helpers;

class Numbers
{
    /**
     * Retorna o menor número de um array
     * 
     * @return int
     */
    public static function min(array $n)
    {
        return min($n);
    }

    /**
     * Retorna o maior número de um array
     * 
     * @return int
     */
    public static function max(array $n)
    {
        return max($n);
    }

    /**
     * Retorna a soma dos números de um array
     * 
     * @return int
     */
    public static function sum(array $n)
    {
        return array_sum($n);
    }

    /**
     * Retorna a média dos números de um array
     * 
     * @return float
     */
    public static function average(array $n)
    {
        return array_sum($n) / count($n);
    }

    /**
     * Verifica se o número é Par
     * 
     * @return boolean
     */
    public static function isEven(int $n)
    {
        return $n % 2 == 0;
    }

    /**
     * Verifica se o número é Ímpar
     * 
     * @return boolean
     */
    public static function isOdd(int $n)
    {
        return $n % 2 != 0;
    }
}
