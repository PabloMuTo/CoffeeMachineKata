<?php

namespace  Src\CoffeeMachine\Domain\ValueObject;

use Src\CoffeeMachine\Domain\Exception\InvalidOrderSugarsException;
use Exception;

final class OrderSugars extends ValueObject
{
	private $sugars;

	public function __construct( $sugars )
	{
		$this->validate($sugars);
		$this->set($sugars);
	}

	private function validate($sugars ) : void
	{
		if ( !isset($sugars) || !is_numeric($sugars) || !is_int($sugars) ) {
			throw new InvalidOrderSugarsException();
		}
	}

    /**
     * Get attribute
     * @return float 
     */
	public function get()
	{
		return $this->sugars;
	}

	/**
     * Set attribute money
     * @return void
     */
	private function set( $sugars )
	{
		$this->sugars = $sugars;
	}
}