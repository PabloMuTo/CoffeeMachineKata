<?php
namespace Src\CoffeeMachine\Application;

class GetDrinkByNameRequest {

    private $drink_name;

    public function __construct( string $drink_name )
    {
        $this->drink_name = $drink_name;
    }

    public function drink_name() : string
    {
        return $this->drink_name;
    }

    
}

