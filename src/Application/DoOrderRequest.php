<?php
namespace Src\CoffeeMachine\Application;

class DoOrderRequest {

    private $drink_name;
    private $money;
    private $sugars;
    private $extraHot;

    public function __construct( string $drink_name, float $money, int $sugars = 0, $extraHot = false )
    {
        $this->drink_name = $drink_name;
        $this->money    = $money;
        $this->sugars   = $sugars;
        $this->extraHot = $extraHot;
    }

    public function drink_name() : string
    {
        return $this->drink_name;
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

