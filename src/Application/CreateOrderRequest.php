<?php
namespace Src\CoffeeMachine\Application;

use Src\CoffeeMachine\Domain\Drink;
use Src\CoffeeMachine\Domain\DrinkEntity;

class CreateOrderRequest {

    private $drink;
    private $money;
    private $sugars;
    private $extraHot;

    public function __construct( Drink $drink, float $money, int $sugars = 0, $extraHot = false )
    {
        $this->drink    = $drink;
        $this->money    = $money;
        $this->sugars   = $sugars;
        $this->extraHot = $extraHot;
    }

    public function drink() : Drink
    {
        return $this->drink;
    }

    public function money() : float
    {
        return $this->money;
    }
    
    public function sugars() : int
    {
        return $this->sugars;
    }

    public function extraHot() : bool
    {
        return $this->extraHot;
    }
}

