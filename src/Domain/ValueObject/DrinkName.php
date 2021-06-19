<?php

namespace  Src\CoffeeMachine\Domain\ValueObject;

use Src\CoffeeMachine\Domain\Exception\InvalidDrinkNameException;
use Exception;
use InvalidArgumentException;

final class DrinkName extends ValueObject
{
	private $name;

	public function __construct( $name )
	{
		$this->validate($name);
		$this->set($name);
	}

	private function validate( $name )
	{
		if ( !$name ) {
			throw new InvalidDrinkNameException();
		}
	}

    /**
     * Get attribute name
     */
	public function get()
	{
		return $this->name;
	}

	/**
     * Set attribute name value
     */
	private function set( $name )
	{
		$this->name = strtolower($name);
    }
}