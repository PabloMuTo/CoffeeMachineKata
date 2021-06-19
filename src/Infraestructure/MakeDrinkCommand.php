<?php

namespace Src\CoffeeMachine\Infraestructure;

use Src\CoffeeMachine\Application\DoOrderRequest;
use Src\CoffeeMachine\Application\DoOrderUseCase;
use Src\CoffeeMachine\Infraestructure\ArrayDrinkRepository;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;

class MakeDrinkCommand extends Command
{
    protected static $defaultName = 'app:order-drink';

    protected function configure()
    {
        $this->addArgument(
            'drink-type',
            InputArgument::REQUIRED,
            'The type of the drink. (Tea, Coffee or Chocolate)'
        );

        $this->addArgument(
            'money',
            InputArgument::REQUIRED,
            'The amount of money given by the user'
        );

        $this->addArgument(
            'sugars',
            InputArgument::OPTIONAL,
            'The number of sugars you want. (0, 1, 2)',
            0
        );

        $this->addOption(
            'extra-hot',
            'e',
            InputOption::VALUE_NONE,
            $description = 'If the user wants to make the drink extra hot'
        );
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $drinkType = strtolower($input->getArgument('drink-type'));
        $money     = (float)$input->getArgument('money');
        $extraHot  = (bool)$input->getOption('extra-hot');
        $sugars    = (int)$input->getArgument('sugars');

        $orderUseCase = new DoOrderUseCase(new ArrayDrinkRepository());
        $request      = new DoOrderRequest($drinkType, $money, $sugars, $extraHot);
        $output->writeln($orderUseCase->execute($request));
    }
}
