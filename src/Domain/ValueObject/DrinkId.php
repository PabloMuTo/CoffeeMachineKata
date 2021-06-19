<?php

namespace Src\CoffeeMachine\Domain\ValueObject;

use InvalidArgumentException;


final class DrinkId extends ValueObject
{
	private $id;

	public function __construct( $id )
	{
		$this->validate($id);
		$this->set($id);
	}

	private function validate($id) : void
	{
		if ( !$id || !is_int($id) ) {
			throw new InvalidArgumentException("Invalid drink identifier");
		}
	}



    /**
     * Get attribute id
     * @return int 
     */
	public function get()
	{
		return $this->id;
	}

	/**
     * Set attribute name value
     * @return void
     */
	private function set( $id )
	{
		$this->id = $id;
    }



}