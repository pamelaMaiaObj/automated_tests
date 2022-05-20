<?php

namespace App\tests;

use App\WordsInNumbers;
use InvalidArgumentException;
use PHPUnit\Framework\TestCase;

/**
 *
 */
class WordsInNumbersTest extends TestCase
{
    private WordsInNumbers $wordsInNumbers;

    /**
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();
        $this->wordsInNumbers = new WordsInNumbers();
    }

    /**
     * @dataProvider setCompostWords
     */
    public function testValidateWordsIsPrimeIsMultipleIsHappyReturnTrue(string $data): void
    {
        $this->assertEquals(
            json_encode($this->getCompostWords()[$data]),
            json_encode($this->wordsInNumbers->validateWordsIsPrimeIsMultipleIsHappy($data))
        );
    }

    /**
     * @return void
     */
    public function testIsHappyNumberMessageException(): void
    {
        $this->expectException(InvalidArgumentException::class);
        $this->expectDeprecationMessage('Oops! the word must have at least one letter');
        $this->wordsInNumbers->validateWordsIsPrimeIsMultipleIsHappy("222# % 3");
    }

    /**
     * @return string[][]
     */
    public function setCompostWords(): array
    {
        return [
            'Pamela Maia' => ['Pamela Maia'],
            'Pamela22 ++ . ? : Maia#' => ['Pamela22 ++ . ? : Maia#']
        ];
    }

    /**
     * @return array<string, array<string, array<string, bool>>>
     */
    public function getCompostWords(): array
    {
        return [
            'Pamela Maia' => [
                'Pamela' => ['prime' => false, 'multiple' => false, 'happy' => false],
                'Maia' => ['prime' => false, 'multiple' => true, 'happy' => false]
            ],
            'Pamela22 ++ . ? : Maia#' => [
                'Pamela' => ['prime' => false, 'multiple' => false, 'happy' => false],
                'Maia' => ['prime' => false, 'multiple' => true, 'happy' => false]
            ]
        ];
    }
}
