<?php
namespace Src\CoffeeMachine\Application;

use Src\CoffeeMachine\Domain\Contract\DrinkRepositoryInterface;
use Src\CoffeeMachine\Domain\Order;
use Src\CoffeeMachine\Domain\OrderEntity;

/**
 * 
 * @author Pablo Muñoz
 * @method execute Use case execution 
 */
final class DoOrderUseCase {

    private $drinkRepository;

    public function __construct( DrinkRepositoryInterface $drinkRepository )
    {
        $this->drinkRepository = $drinkRepository;
    }

    /**
     * Use case execution
     * 
     * @param DoOrderRequest $request
     * @return string
     */
    public function execute( DoOrderRequest $request ) : string
    {
        $useCase = new GetDrinkByNameUseCase($this->drinkRepository);
        $drink   = $useCase->execute(new GetDrinkByNameRequest($request->drink_name()));

        if ( !$drink )
        {
            return "The drink type should be tea, coffee or chocolate.";
        }

        $createOrderUseCase = new CreateOrderUseCase();
        $order = $createOrderUseCase->execute(
            new CreateOrderRequest($drink, $request->money(), $request->sugars(), $request->extraHot())
        );

        if ( !$order->hasEnoughtMoney() )
        {
            return "The ".$drink->getName()->get()." costs ".$drink->getPrice()->get().".";
        }

        if ( !$order->checkCorrectNumberofSuggars() )
        {
            return "The number of sugars should be between 0 and 2.";
        }

        

        return $this->buildOutputMessage($order);
    }

    /**
     * Build the output message when validations are ok
     * 
     * @param OrderEntity $order Order Entity
     * @return string
     */
    private function buildOutputMessage( Order $order ) : string
    {
        $output = 'You have ordered a '.$order->getDrink()->getName()->get();

        if ( $order->getExtraHot()->get() ) {
            $output .= " extra hot";
        }

        if ( $order->hasSugars() ) {
            $output .= " with ".$order->getSugars()->get()." sugars (stick included)";
        }

        return $output;
    }
}

