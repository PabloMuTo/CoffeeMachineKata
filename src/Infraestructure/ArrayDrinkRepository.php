<?php

namespace Src\CoffeeMachine\Infraestructure;

use Src\CoffeeMachine\Domain\Contract\DrinkRepositoryInterface;
use Src\CoffeeMachine\Domain\Drink;
use Src\CoffeeMachine\Infraestructure\DataMapper\DrinkDataMapper;

class ArrayDrinkRepository implements DrinkRepositoryInterface {

    private $drinks;

    /**
     * Get drink "model"
     */
    public function __construct()
    {
        $this->drinks = Drinks::get();
    }

    /**
     * 
     */
    public function all() : array
    {
        return array_map(function($n){
            return  DrinkDataMapper::toEntity($n);
        }, $this->drinks);
    }

    public function findById(int $id) : ?Drink
    {
        $key = $this->getKeySearch($this->drinks, $id, "uid");
        if ( $key === false ) {
            return null;
        }
        $drink = $this->getArrayDrinkFromKey($this->drinks, $key);
        return DrinkDataMapper::toEntity($drink);
    }


    public function findByName(string $name): ?Drink
    {
        $key = $this->getKeySearch($this->drinks, $name, "name");
        if ( $key === false ) {
            return null;
        }

        $drink = $this->getArrayDrinkFromKey($this->drinks, $key);
        return DrinkDataMapper::toEntity($drink);
    }


    /**
     * 
     */
    private function getKeySearch ( array $arr, $value, string $column )
    {
        return array_search($value, array_column($arr, $column));
    }

    /**
     * Get array position
     * 
     * @param array $arr array of drinnks
     * @param int $key search key
     */
    private function getArrayDrinkFromKey( array $arr, $key )
    {
        return $arr[$key];
    }
}