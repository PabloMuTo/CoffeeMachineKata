<?php

namespace Src\CoffeeMachine\Tests\Unit\Domain\ValueObject;

use Src\CoffeeMachine\Domain\Exception\InvalidOrderSugarsException;
use Src\CoffeeMachine\Domain\ValueObject\OrderSugars;
use Exception;
use PHPUnit\Framework\TestCase;

class OrderSugarsTest extends TestCase
{

    public function testValidSugarsOrder()
    {
        $sugars = 2;
        $valueObject = new OrderSugars($sugars);

        $this->assertIsObject($valueObject);
        $this->assertObjectHasAttribute("sugars", $valueObject);
        $this->assertEquals($sugars, $valueObject->get());
    }

    public function testInvalidNumOfSugars()
    {
        $this->expectException(InvalidOrderSugarsException::class);
        $sugars = "ss";
        new OrderSugars($sugars);
    }
}
