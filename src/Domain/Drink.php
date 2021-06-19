<?php

namespace Src\CoffeeMachine\Domain;

use Src\CoffeeMachine\Domain\ValueObject\DrinkId;
use Src\CoffeeMachine\Domain\ValueObject\DrinkName;
use Src\CoffeeMachine\Domain\ValueObject\DrinkPrice;

final class Drink
{
    private $id;
	private $name;
	private $price;

	private function __construct( DrinkId $id, DrinkName $name, DrinkPrice $price )
	{
        $this->id    = $id;
		$this->name  = $name;
		$this->price = $price;
	}

	/**
	 * Get drink id
	 * @return DrinkId
	 */
    public function getId() : DrinkId
    {
        return $this->id;
    }

	/**
	 * Get drink name
	 * @return DrinkName
	 */
	public function getName() : DrinkName
	{
		return $this->name;
	}

	/**
	 * Get drink price
	 * @return DrinkPrice
	 */
	public function getPrice() : DrinkPrice
	{
		return $this->price;
	}


	public static function create(DrinkId $id, DrinkName $name, DrinkPrice $price) : self
	{
		return new self($id, $name, $price);
	}
}