<?php

namespace Src\CoffeeMachine\Tests\Unit\Domain;

use Src\CoffeeMachine\Domain\Drink;
use Src\CoffeeMachine\Domain\Order;
use Src\CoffeeMachine\Domain\ValueObject\DrinkId;
use Src\CoffeeMachine\Domain\ValueObject\DrinkName;
use Src\CoffeeMachine\Domain\ValueObject\DrinkPrice;
use Src\CoffeeMachine\Domain\ValueObject\OrderExtraHot;
use Src\CoffeeMachine\Domain\ValueObject\OrderMoney;
use Src\CoffeeMachine\Domain\ValueObject\OrderSugars;
use PHPUnit\Framework\TestCase;

class OrderTest extends TestCase {


    public function testCanCreateOrder()
    {
        $drink = Drink::create(
            new DrinkId(1),
            new DrinkName("Cocacola"),
            new DrinkPrice(0.9)
        );
        $order = Order::create($drink, new OrderMoney(1.2), new OrderSugars(2), new OrderExtraHot(true));
        self::assertInstanceOf(Order::class, $order);
        self::assertTrue($order->getExtraHot()->get());
    }

    /**
     * @dataProvider pricesProvider
     */
    public function testEnoughtMoneyOrder(
        float $drinkPrice, float $orderMoney, bool $expected
    )
    {
        $drink = Drink::create(new DrinkId(1), new DrinkName("name"), new DrinkPrice($drinkPrice));
        $order = Order::create($drink, new OrderMoney($orderMoney), new OrderSugars(2), new OrderExtraHot(false));
        $this->assertEquals($expected, $order->hasEnoughtMoney());
    }

    public function pricesProvider() : array
    {
        return [
            [
                0.6, 0.7, true
            ],
            [
                1, 0.7, false
            ],
            [
                0.7, 0.7, true
            ],
            
        ];
    }

    /**
     * @dataProvider sugarsProvider
     */
    public function testOrderHasSugars(
        $sugars, bool $expected
    )
    {
        $drink = Drink::create(new DrinkId(1), new DrinkName("name"), new DrinkPrice(0.9));
        $order = Order::create($drink, new OrderMoney(1.1), new OrderSugars($sugars), new OrderExtraHot(false));
        $this->assertEquals($expected, $order->hasSugars());
    }

    public function sugarsProvider() : array
    {
        return [
            [
                0, false
            ],
            [
                1, true
            ],
            [
                2, true
            ],
            [
                3, true
            ]
        ];
    }

}