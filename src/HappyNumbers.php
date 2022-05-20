<?php

namespace App;

use App\Classes\Numbers;
use InvalidArgumentException;

/**
 * Class responsible for returning a friendly message if the number is happy or not
 */
class HappyNumbers
{
    /**
     * @var Numbers
     */
    private Numbers $numbers;

    /**
     */
    public function __construct()
    {
        $this->numbers = new Numbers();
    }

    /**
     * @param int $number
     * @return string
     */
    public function isHappyNumberMessage(int $number): string
    {
        if ($this->numbers->isNegative($number)) {
            throw new InvalidArgumentException('Please enter a positive integer');
        }
        if ($this->numbers->isHappy($number)) {
            return 'This number is happy';
        }
        return 'This number is not happy';
    }
}
