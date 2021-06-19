<?php

namespace  Src\CoffeeMachine\Tests\Unit\Domain\ValueObject;

use Src\CoffeeMachine\Domain\Exception\InvalidDrinkNameException;
use Src\CoffeeMachine\Domain\ValueObject\DrinkName;
use Exception;
use PHPUnit\Framework\TestCase;

class DrinkNameTest extends TestCase
{

    public function testValidDrinkName()
    {
        $name = "coffee";
        $valueObject = new DrinkName($name);

        $this->assertIsObject($valueObject);
        $this->assertEquals($name, $valueObject->get());
    }


    public function testValidDrinkNameCapitalLetter()
    {
        $name = "Coffee";
        $valueObject = new DrinkName($name);

        $this->assertEquals( strtolower($name), $valueObject->get());
    }


    public function testInvalidDrinkName()
    {
        $this->expectException(InvalidDrinkNameException::class);
         new DrinkName("");
    }
}
