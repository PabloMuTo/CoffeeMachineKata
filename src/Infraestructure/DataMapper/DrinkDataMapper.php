<?php

namespace Src\CoffeeMachine\Infraestructure\DataMapper;

use Src\CoffeeMachine\Domain\Drink;
use Src\CoffeeMachine\Domain\ValueObject\DrinkId;
use Src\CoffeeMachine\Domain\ValueObject\DrinkName;
use Src\CoffeeMachine\Domain\ValueObject\DrinkPrice;

class DrinkDataMapper {

    /**
     * Transform array to entity
     * 
     * @param array $drink
     * @return DrinkEntity
     */
    public static function toEntity( array $drink ) : Drink
    {
        return Drink::create(
            new DrinkId($drink['uid']),
            new DrinkName($drink['name']),
            new DrinkPrice($drink['price'])
        );
    }

    /**
     * Transform entity to array
     * 
     * @param DrinkEntity $drink
     * @return array array positions: uid, name, price
     */
    public static function toArray( Drink $drink ) : array
    {
        return [
            'uid'   => $drink->getId()->get(),
            'name'  => $drink->getName()->get(),
            'price' => $drink->getPrice()->get()
        ];
    }
}