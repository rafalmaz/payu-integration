<?php


namespace App\Command;


use App\Enum\OAuthEnvTypeEnum;
use App\Model\Client;
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
        $Client = new Client(0, '');
        $OAuth = new OAuthService($Client, OAuthEnvTypeEnum::DEV);
        $TokenResponse = $OAuth->getToken();

        $PayUService = new PayUService($Client, $TokenResponse->getToken());

        return Command::SUCCESS;
    }
}