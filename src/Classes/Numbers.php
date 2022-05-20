<?php

namespace App\Classes;

/**
 * Class to centralize numeric processing
 */
class Numbers
{
    /**
     * @param int $number
     * @param int $multiple
     * @return bool
     */
    public function isMultiple(int $number, int $multiple): bool
    {
        return $number % $multiple == 0;
    }

    /**
     * @param int $number
     * @return bool
     */
    public function isHappy(int $number): bool
    {
        $happy = [];
        while (true) {
            $array = str_split("$number");
            array_walk($array, function (&$a) {
                $a = pow((int)$a, 2);
            });
            $number = array_sum($array);
            if ($number == 1) {
                return true;
            }
            if (in_array($number, $happy)) {
                return false;
            }
            $happy[] = $number;
        }
    }

    /**
     * @param int $number
     * @return bool
     */
    public function isNegative(int $number): bool
    {
        return ($number < 0);
    }

    /**
     * @param int $number
     * @return bool
     */
    public function verifyMultipleThreeOrFive(int $number): bool
    {
        return ($this->isMultiple($number, 3) || $this->isMultiple($number, 5));
    }

    /**
     * @param int $number
     * @return bool
     */
    public function verifyMultipleThreeAndFive(int $number): bool
    {
        return ($this->isMultiple($number, 3) && $this->isMultiple($number, 5));
    }

    /**
     * @param int $number
     * @return bool
     */
    public function verifyMultipleThreeOrFiveAndSeven(int $number): bool
    {
        return ($this->verifyMultipleThreeOrFive($number) && $this->isMultiple($number, 7));
    }
}
