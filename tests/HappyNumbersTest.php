<?php

namespace App\tests;

use App\HappyNumbers;
use Exception;
use InvalidArgumentException;
use PHPUnit\Framework\TestCase;

class HappyNumbersTest extends TestCase
{
    private HappyNumbers $harryNumber;

    public function setUp(): void
    {
        parent::setUp();
        $this->harryNumber = new HappyNumbers();
    }

    /**
     * @throws Exception
     */
    public function testIsHappyNumberMessageReturnTrue(): void
    {
        $this->assertEquals('This number is happy', $this->harryNumber->isHappyNumberMessage(7));
    }

    /**
     * @throws Exception
     */
    public function testIsHappyNumberMessageReturnFalse(): void
    {
        $this->assertEquals('This number is not happy', $this->harryNumber->isHappyNumberMessage(4));
    }

    /**
     * @throws Exception
     */
    public function testIsHappyNumberMessageException(): void
    {
        $this->expectException(InvalidArgumentException::class);
        $this->expectDeprecationMessage('Please enter a positive integer');
        $this->harryNumber->isHappyNumberMessage(-1);
    }
}
