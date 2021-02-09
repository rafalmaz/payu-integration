<?php


namespace App\Command;


use App\Enum\OAuthEnvTypeEnum;
use App\Model\Client;
use App\Model\PaymentOrder\Buyer;
use App\Model\PaymentOrder\PaymentOrder;
use App\Model\PaymentOrder\Product;
use App\Service\OAuthService;
use App\Service\PayUService;
use App\Service\SignatureService;
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
        $Client = new Client('300746', '2ee86a66e5d97e3fadc400c9f19b065d', '507f311d8784dc0765a72fc40d0aa83a', '145227');
        $OAuth = new OAuthService($Client, OAuthEnvTypeEnum::DEV);
        $SignatureService = new SignatureService($Client->getSecondKey(), $Client->getPosId());
        $TokenResponse = $OAuth->getToken();

        $PayUService = new PayUService($Client, $TokenResponse->getToken(), $SignatureService);

        $buyer = new Buyer('jan_kowalski@test.pl', '123456789', 'Jan', 'Kowalsk');

        $products[] = new Product('Produkt 1', 1000, 1);

        $order = new PaymentOrder(
            'http://shop.url/notify',
            'http://shop.url/continue',
            "123.123.123.123",
            $Client->getClientId(),
            'Opis zamówienia',
            'PLN',
            1000,
            $buyer,
            $products
        );

        $PayUService->createNewPaymentOrder($order);

        return Command::SUCCESS;
    }
}