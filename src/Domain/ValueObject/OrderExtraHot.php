<?php

namespace  Src\CoffeeMachine\Domain\ValueObject;


final class OrderExtraHot extends ValueObject
{
	private $extraHot;

	public function __construct( $extraHot )
	{
		$this->set($extraHot);
	}

    /**
     * Get attribute
     * @return float 
     */
	public function get()
	{
		return $this->extraHot;
	}

	/**
     * Set attribute money
     * @return void
     */
	private function set( $extraHot )
	{
		$this->extraHot = (bool)$extraHot;
	}
}