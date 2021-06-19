<?php

namespace Src\CoffeeMachine\Tests\Unit\Domain\ValueObject;

use Src\CoffeeMachine\Domain\ValueObject\OrderExtraHot;
use PHPUnit\Framework\TestCase;

class OrderExtraHotTest extends TestCase
{

    public function testValidExtraHotOrder()
    {
        $extraHot = true;
        $valueObject = new OrderExtraHot($extraHot);

        $this->assertIsObject($valueObject);
        $this->assertObjectHasAttribute("extraHot", $valueObject);
        $this->assertEquals($extraHot, $valueObject->get());
    }
}
