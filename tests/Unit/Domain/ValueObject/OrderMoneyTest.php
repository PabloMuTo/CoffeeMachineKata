<?php

namespace Tests\Unit\Domain\ValueObject;

use Src\CoffeeMachine\Domain\Exception\InvalidOrderMoneyException;
use Src\CoffeeMachine\Domain\ValueObject\OrderMoney;
use Exception;
use PHPUnit\Framework\TestCase;

class OrderMoneyTest extends TestCase
{

    public function testValidMoneyOrder()
    {
        $money = 4.5;
        $valueObject = new OrderMoney($money);

        $this->assertIsObject($valueObject);
        $this->assertObjectHasAttribute("money", $valueObject);
        $this->assertEquals($money, $valueObject->get());
    }


    public function testIncorrectMoneyOrder()
    {
        $this->expectException(InvalidOrderMoneyException::class);
        new OrderMoney(-0.5);
    }


    public function testInvalidMoneyOrder()
    {
        $this->expectException(InvalidOrderMoneyException::class);
        new OrderMoney("ss");
    }
}
