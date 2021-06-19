<?php

namespace  Src\CoffeeMachine\Domain\ValueObject;

use Src\CoffeeMachine\Domain\Exception\InvalidOrderMoneyException;
use Exception;

final class OrderMoney extends ValueObject
{
	private $money;

	public function __construct( $money )
	{
		$this->validate( $money );
		$this->set($money);
	}


	private function validate( $money ) : void
	{
		if ( !$money || !is_float($money) || $money < 0 ) {
			throw new InvalidOrderMoneyException();
		}
	}

    /**
     * Get attribute mone
     * @return float 
     */
	public function get()
	{
		return $this->money;
	}

	/**
     * Set attribute money
     * @return void
     */
	private function set( $money )
	{
		$this->money = $money;
    }
}