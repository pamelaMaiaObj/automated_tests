<?php

namespace App;

use App\Classes\Numbers;

/**
 * Class responsible for validating if a number is multiple of (3, 5, 7)
 */
class Multiples
{
    /**
     * @var Numbers
     */
    private Numbers $numbers;

    /**
     * @var array<int>
     */
    private array $range;


    /**
     * @param int $numberInitial
     * @param int $numberEnd
     */
    public function __construct(int $numberInitial, int $numberEnd)
    {
        $this->numbers = new Numbers();
        $this->range = range($numberInitial, $numberEnd - 1);
    }

    /**
     * @return int
     */
    public function sumMultipleThreeOrFive(): int
    {
        $array = array_filter($this->range, function ($number) {
            return ($this->numbers->verifyMultipleThreeOrFive($number));
        });
        return (int)array_sum($array);
    }

    /**
     * @return int
     */
    public function sumMultipleThreeAndFive(): int
    {
        $array = array_filter($this->range, function ($number) {
            return ($this->numbers->verifyMultipleThreeAndFive($number));
        });
        return (int)array_sum($array);
    }

    /**
     * @return int
     */
    public function sumMultipleThreeOrFiveAndSeven(): int
    {
        $array = array_filter($this->range, function ($number) {
            return ($this->numbers->verifyMultipleThreeOrFiveAndSeven($number));
        });
        return (int)array_sum($array);
    }
}
