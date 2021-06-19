<?php

namespace Src\CoffeeMachine\Domain\ValueObject;

abstract class ValueObject
{
	abstract public function __construct( $value );

	abstract public function get();

}