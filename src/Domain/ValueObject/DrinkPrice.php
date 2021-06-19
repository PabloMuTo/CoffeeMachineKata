<?php

namespace  Src\CoffeeMachine\Domain\ValueObject;

use Src\CoffeeMachine\Domain\Exception\InvalidDrinkPriceException;
use Exception;

final class DrinkPrice extends ValueObject
{
	private $price;

	public function __construct( $price )
	{
		$this->validate($price);
		$this->set($price);
	}

	private function validate( $price ) : void
	{
		if ( !$price || !is_float($price) ) {
			throw new InvalidDrinkPriceException();
		}
	}

    /**
     * Get attribute
     */
	public function get()
	{
		return $this->price;
	}

	/**
     * Set attribute price value
	 * @return void
     */
	private function set( $price )
	{
		
		$this->price = $price;
	}

	/**
	 * 
	 */
	public function enoughMoney( DrinkPrice $price ) : bool
	{
		return ($this->price <= $price->get());
	}
}