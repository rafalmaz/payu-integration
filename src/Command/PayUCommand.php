<?php


namespace App\Command;


use App\Enum\OAuthEnvTypeEnum;
use App\Model\Client;
use App\Model\PaymentOrder\Buyer;
use App\Model\PaymentOrder\PaymentOrder;
use App\Model\PaymentOrder\Product;
use App\Service\OAuthService;
use App\Service\PayUService;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class PayUCommand extends Command
{
    // the name of the command (the part after "bin/console")
    protected static $defaultName = 'app:payu-run';

    protected function configure()
    {
        $this
            ->setDescription('Command for payu tests')
            ->setHelp('Command for payu tests')
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $Client = new Client('', '');
        $OAuth = new OAuthService($Client, OAuthEnvTypeEnum::DEV);
        $TokenResponse = $OAuth->getToken();

        $PayUService = new PayUService($Client, $TokenResponse->getToken());

        $buyer = new Buyer('jan_kowalski@test.pl', '123456789', 'Jan', 'Kowalsk');

        $products[] = new Product('product1', 1000, 5);

        $order = new PaymentOrder(
            'test@test.pl',
            "127.0.0.1",
            $Client->getClientId(),
            'test',
            'PLN',
            10000,
            $buyer,
            $products
        );

        $PayUService->createNewPaymentOrder($order);

        return Command::SUCCESS;
    }
}