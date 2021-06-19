<?php

namespace Src\CoffeeMachine\Tests\Unit\Infraestructure;

use Src\CoffeeMachine\Domain\Contract\DrinkRepositoryInterface;
use Src\CoffeeMachine\Domain\Drink;
use Src\CoffeeMachine\Domain\ValueObject\DrinkId;
use Src\CoffeeMachine\Domain\ValueObject\DrinkName;
use Src\CoffeeMachine\Domain\ValueObject\DrinkPrice;
use PHPUnit\Framework\TestCase;

class ArrayDrinkRepositoryTest extends TestCase
{
    private $repository;

    protected function setUp()
    {
        parent::setUp();
        $this->repository = $this->createMock(DrinkRepositoryInterface::class);
    }

    public function testFindByIdTea()
    {
        $id = 1;
        $this->repository->method('findById')->with($id)->willReturn(Drink::create(
            new DrinkId(1),
            new DrinkName("tea"),
            new DrinkPrice(0.5)
        ));

        $this->assertInstanceOf(Drink::class, $this->repository->findById($id) );
        $this->assertEquals("tea", $this->repository->findById($id)->getName()->get());
        $this->assertInstanceOf(DrinkId::class, $this->repository->findById($id)->getId());
    }


    public function testFindByIdIncorrectId()
    {
        $id = 4;
        $this->repository->method('findById')->with($id)->willReturn(null);
        $this->assertNull($this->repository->findById($id));
    }



    public function testFindByNameTea()
    {
        $name = "tea";
        $this->repository->method('findByName')->with($name)->willReturn(Drink::create(
            new DrinkId(1),
            new DrinkName("tea"),
            new DrinkPrice(0.5)
        ));

        $this->assertInstanceOf(Drink::class, $this->repository->findByName($name) );
        $this->assertEquals("tea", $this->repository->findByName($name)->getName()->get());
        $this->assertInstanceOf(DrinkPrice::class, $this->repository->findByName($name)->getPrice());
    }


    public function testFindByNameIncorrectId()
    {
        $name = "capuchino";
        $this->repository->method('findByName')->with($name)->willReturn(null);
        $this->assertNull($this->repository->findByName($name));
    }



    public function testGetAll()
    {
        $this->repository->method('all');
        $this->assertContainsOnlyInstancesOf(Drink::class, $this->repository->all());
    }
}
