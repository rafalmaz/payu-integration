<?php


namespace App\Model\Response;


class CreateOrderResponse extends Response
{
    public function __construct(bool $error, string $message) {
        parent::__construct($error, $message);
    }
}