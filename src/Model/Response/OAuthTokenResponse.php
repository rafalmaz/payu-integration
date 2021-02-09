<?php


namespace App\Model\Response;


class OAuthTokenResponse extends Response
{
    /**
     * @var string
     */
    private $token;

    /**
     * @var int
     */
    private $expiresIn;

    /**
     * OAuthTokenResponse constructor.
     * @param bool $error
     * @param string $message
     * @param string $token
     * @param int $expiresIn
     */
    public function __construct(bool $error, string $message, string $token, int $expiresIn) {
        parent::__construct($error, $message);
        $this->token = $token;
        $this->expiresIn = $expiresIn;
    }

    /**
     * @return string
     */
    public function getToken(): string {
        return $this->token;
    }


}