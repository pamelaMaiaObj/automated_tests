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
