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
     * @var string
     */
    private $secondKey;
    /**
     * @var string
     */
    private $posId;

    /**
     * OAuth constructor.
     * @param string $clientId
     * @param string $clientSecret
     * @param string $secondKey
     * @param string $posId
     */
    public function __construct(string $clientId, string $clientSecret, string $secondKey, string $posId) {
        $this->clientId = $clientId;
        $this->clientSecret = $clientSecret;
        $this->secondKey = $secondKey;
        $this->posId = $posId;
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

    /**
     * @return string
     */
    public function getSecondKey(): string {
        return $this->secondKey;
    }

    /**
     * @return string
     */
    public function getPosId(): string {
        return $this->posId;
    }
}