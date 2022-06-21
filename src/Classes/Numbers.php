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
    public function isPrime(int $number): bool
    {
        if (gmp_prob_prime($number) == 2) {
            return true;
        }
        return false;
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

    /**
     * @param array<string> $words
     * @return array<string, int>
     */
    public function getArrayWordsSum(array $words): array
    {
        return array_merge(
            ...array_map(function ($word) {
                return [$word => $this->sumNumbersValuesWord($word)];
            }, $words)
        );
    }

    /**
     * @param string $words
     * @return string
     */
    public function cleanWords(string $words): string
    {
        return trim((string)preg_replace(["/[^a-z A-Z]/", "/\s+/"], " ", $words));
    }

    /**
     * @param string $word
     * @return int
     */
    public function sumNumbersValuesWord(string $word): int
    {
        $alfa = $this->getArrayAlphabetCaseSensitive();
        return (int)array_sum(
            array_map(function ($letter) use ($alfa) {
                if ($alfa[$letter] != null) {
                    return $alfa[$letter];
                }
            }, str_split($word))
        );
    }

    /**
     * @return array<int|string>
     */
    public function getArrayAlphabetCaseSensitive(): array
    {
        return array_replace($this->getArrayAlphabetLowerCase(), $this->getArrayAlphabetUpperCase());
    }

    /**
     * @return array<int|string>
     */
    public function getArrayAlphabetUpperCase(): array
    {
        return array_combine(range('A', 'Z'), range(27, 52));
    }

    /**
     * @return array<int|string>
     */
    public function getArrayAlphabetLowerCase(): array
    {
        return array_combine(range('a', 'z'), range(1, 26));
    }
}
