<?php


namespace App\Service;


use App\Model\Client;

class PayUService
{
    /**
     * @var Client
     */
    private $client;
    /**
     * @var string
     */
    private $token;

    /**
     * PayUService constructor.
     * @param Client $client
     * @param string $token
     */
    public function __construct(Client $client, string $token) {
        $this->client = $client;
        $this->token = $token;
    }
}