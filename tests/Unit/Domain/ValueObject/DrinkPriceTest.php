<?php

namespace Src\CoffeeMachine\Tests\Unit\Domain\ValueObject;

use Src\CoffeeMachine\Domain\Exception\InvalidDrinkPriceException;
use Src\CoffeeMachine\Domain\ValueObject\DrinkPrice;
use Exception;
use PHPUnit\Framework\TestCase;

class DrinkPriceTest extends TestCase
{

    public function testValidDrinPrice()
    {
        $price = 0.4;
        $valueObject = new DrinkPrice($price);

        $this->assertIsObject($valueObject);
        $this->assertEquals($price, $valueObject->get());
    }


    public function testInvalidDrinkName()
    {
        $this->expectException(InvalidDrinkPriceException::class);
        new DrinkPrice("10");
    }
}
