<?php


namespace App\Model\Response;


class OAuthTokenResponse
{
    /**
     * @var bool
     */
    private $error;

    /**
     * @var string
     */
    private $message;

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
        $this->error = $error;
        $this->message = $message;
        $this->token = $token;
        $this->expiresIn = $expiresIn;
    }

    /**
     * @return bool
     */
    public function isError(): bool {
        return $this->error;
    }

    /**
     * @return string
     */
    public function getMessage(): string {
        return $this->message;
    }

    /**
     * @return string
     */
    public function getToken(): string {
        return $this->token;
    }


}