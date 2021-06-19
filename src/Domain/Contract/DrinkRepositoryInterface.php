<?php

namespace Src\CoffeeMachine\Domain\Contract;

use Src\CoffeeMachine\Domain\Drink;

/**
 * Drink contract / interface
 * 
 * @author Pablo Muñoz
 * @method all() get all drinks
 * @method finsById() get drink searched by name
 * @method finsByName() get drink searcherd by uid
 */
interface DrinkRepositoryInterface
{

    /**
     * Get all drinks
     * 
     * @return array
     */
    public function all() : array;

    /**
     * Find drink by name
     * 
     * @param string $name drink name
     * @return DrinkEntity
     */
    public function findByName( string $name ) : ?Drink;

    /**
     * Find drink by unique identifier
     * 
     * @param int $id identifier drink
     * @return DrinkEntity
     */
    public function findById( int $id ) : ?Drink;
}