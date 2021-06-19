<?php

namespace Src\CoffeeMachine\Tests\Unit\Infraestructure\DataMapper;

use Src\CoffeeMachine\Domain\Drink;
use Src\CoffeeMachine\Domain\ValueObject\DrinkId;
use Src\CoffeeMachine\Domain\ValueObject\DrinkName;
use Src\CoffeeMachine\Domain\ValueObject\DrinkPrice;
use Src\CoffeeMachine\Infraestructure\DataMapper\DrinkDataMapper;
use Exception;
use PHPUnit\Framework\TestCase;

class DrinkDataMapperTest extends TestCase
{

    /**
     * 
     */
    public function testToEntityCorrect()
    {
        $drink = DrinkDataMapper::toEntity([
            'uid' => 4,
            'name' => 'cocacola',
            'price' => 1.2
        ]);

        $this->assertInstanceOf(Drink::class, $drink);
    }


    public function testToArray()
    {
        $drink = DrinkDataMapper::toArray(Drink::create(
            new DrinkId(5),
            new DrinkName('beer'),
            new DrinkPrice(0.9)
        ));

        $this->assertIsArray($drink);
        $this->assertEquals("beer", $drink['name']);
        $this->assertArrayHasKey('uid', $drink);
        $this->assertArrayHasKey('name', $drink);
        $this->assertArrayHasKey('price', $drink);

    }
}
