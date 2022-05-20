<?php

namespace App;

use App\Classes\Numbers;
use InvalidArgumentException;

/**
 * Class responsible for validating if a number is multiple of (3, 5, 7)
 */
class WordsInNumbers
{
    private Numbers $numbers;

    /**
     *
     */
    public function __construct()
    {
        $this->numbers = new Numbers();
    }

    /**
     * @param string $words
     * @return array<string, int>
     */
    public function validateWordsIsPrimeIsMultipleIsHappy(string $words): array
    {
        if (empty($this->numbers->cleanWords($words))) {
            throw new InvalidArgumentException('Oops! the word must have at least one letter');
        }

        $array = $this->numbers->getArrayWordsSum(explode(" ", $this->numbers->cleanWords($words)));
        array_walk($array, function (&$a) {
            $a = [
                'prime' => $this->numbers->isPrime((int)$a),
                'multiple' => $this->numbers->verifyMultipleThreeOrFive((int)$a),
                'happy' => $this->numbers->isHappy((int)$a)
            ];
        });
        return $array;
    }
}
