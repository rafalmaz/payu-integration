<?php


namespace App\Model;


class Client
{
    /**
     * @var string
     */
    private $clientId;

    /**
     * @var string
     */
    private $clientSecret;

    /**
     * OAuth constructor.
     * @param string $clientId
     * @param string $clientSecret
     */
    public function __construct(string $clientId, string $clientSecret) {
        $this->clientId = $clientId;
        $this->clientSecret = $clientSecret;
    }

    /**
     * @return string
     */
    public function getClientId(): string {
        return $this->clientId;
    }

    /**
     * @return string
     */
    public function getClientSecret(): string {
        return $this->clientSecret;
    }

}