<?php
namespace Src\CoffeeMachine\Application;

use Src\CoffeeMachine\Domain\Order;
use Src\CoffeeMachine\Domain\ValueObject\OrderExtraHot;
use Src\CoffeeMachine\Domain\ValueObject\OrderMoney;
use Src\CoffeeMachine\Domain\ValueObject\OrderSugars;

final class CreateOrderUseCase {

    /**
     * 
     */
    public function execute( CreateOrderRequest $request )
    {
        return Order::create(
            $request->drink(),
            new OrderMoney($request->money()),
            new OrderSugars($request->sugars()),
            new OrderExtraHot($request->extraHot())
        );
    }

}

