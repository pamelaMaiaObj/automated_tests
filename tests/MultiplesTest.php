<?php

namespace App\tests;

use App\Classes\Numbers;
use App\Multiples;
use PHPUnit\Framework\TestCase;

/**
 * Class responsible by the centralization of the tests of the Multiples class
 */
class MultiplesTest extends TestCase
{
    /**
     * @var Multiples
     */
    private Multiples $multiples;

    /**
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();
        $this->multiples = new Multiples(1, 1000);
    }

    /**
     * @return void
     */
    public function testSumMultipleThreeOrFive()
    {
        $this->assertEquals(233168, $this->multiples->sumMultipleThreeOrFive());
    }

    /**
     * @return void
     */
    public function testSumMultipleThreeAndFive()
    {
        $this->assertEquals(33165, $this->multiples->sumMultipleThreeAndFive());
    }

    /**
     * @return void
     */
    public function testSumMultipleThreeOrFiveAndSeven()
    {
        $this->assertEquals(33173, $this->multiples->sumMultipleThreeOrFiveAndSeven());
    }
}
