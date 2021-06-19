<?php
namespace Src\CoffeeMachine\Application;

use Src\CoffeeMachine\Domain\Contract\DrinkRepositoryInterface;

final class GetDrinksUseCase {

    private $drinkRepository;

    public function __construct( DrinkRepositoryInterface $drinkRepository )
    {
        $this->drinkRepository = $drinkRepository;
    }


    public function execute()
    {
        return $this->drinkRepository->all();
    }

}

