<?php

namespace Src\CoffeeMachine\Domain;

use Src\CoffeeMachine\Domain\ValueObject\OrderExtraHot;
use Src\CoffeeMachine\Domain\ValueObject\OrderMoney;
use Src\CoffeeMachine\Domain\ValueObject\OrderSugars;

final class Order
{
    private $drink;
	private $money;
	private $sugars;
	private $extraHot;

	const MAX_SUGARS = 2;
	const MIN_SUGARS = 0;


	private function __construct( Drink $drink, OrderMoney $money, OrderSugars $sugars, OrderExtraHot $extraHot )
	{
        $this->drink    = $drink;
		$this->money    = $money;
		$this->sugars   = $sugars;
		$this->extraHot = $extraHot;
	}

	/**
	 * Get drink entity
	 * @return DrinkEntity
	 */
	public function getDrink() : Drink
	{
		return $this->drink;
	}

	/**
	 * Get drink price
	 * @return OrderMoney
	 */
	public function getMoney() : OrderMoney
	{
		return $this->money;
	}

	/**
	 * Get order sugars
	 * @return OrderSugars
	 */
	public function getSugars() : OrderSugars
	{
		return $this->sugars;
	}

	/**
	 * Get order option extra hot
	 * @return OrderExtraHot
	 */
	public function getExtraHot() : OrderExtraHot
	{
		return $this->extraHot;
	}


	public static function create( Drink $drink, OrderMoney $money, OrderSugars $sugars, OrderExtraHot $extraHot ) : self
	{
		return new self($drink, $money, $sugars, $extraHot);
	}


	/**
	 * check if order has enought money to buy drink
	 * @return bool
	 */
	public function hasEnoughtMoney() : bool
	{
		return ($this->drink->getPrice()->get() <= $this->money->get());
	}


	/**
	 * Check if order has correct number of suggars (between min and max)
	 * @return bool
	 */
	public function checkCorrectNumberofSuggars() : bool
	{
		$suggars = $this->getSugars()->get();
		return ( $suggars  >= self::MIN_SUGARS && $suggars <= self::MAX_SUGARS);
	}

	/**
	 * Check if order has suggars
	 * @return bool
	 */
	public function hasSugars() : bool
	{
		return ( $this->getSugars()->get() > 0 );
	}
}



