<?php
namespace Src\CoffeeMachine\Application;

use Src\CoffeeMachine\Domain\Contract\DrinkRepositoryInterface;


final class GetDrinkByNameUseCase {

    private $drinkRepository;

    public function __construct( DrinkRepositoryInterface $drinkRepository )
    {
        $this->drinkRepository = $drinkRepository;
    }


    public function execute( GetDrinkByNameRequest $request )
    {
        return $this->drinkRepository->findByName($request->drink_name());
    }

}

