<?php


namespace App\Model\Response;


class Response
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
     * Response constructor.
     * @param bool $error
     * @param string $message
     */
    public function __construct(bool $error, string $message) {
        $this->error = $error;
        $this->message = $message;
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
}