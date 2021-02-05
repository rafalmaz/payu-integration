<?php


namespace App\Model\PaymentOrder;


class Product
{
    /**
     * @var string
     */
    public $name;
    /**
     * @var string
     */
    public $unitPrice;
    /**
     * @var string
     */
    public $quantity;

    /**
     * PaymentOrderProduct constructor.
     * @param string $name
     * @param string $unitPrice
     * @param string $quantity
     */
    public function __construct(string $name, string $unitPrice, string $quantity) {
        $this->name = $name;
        $this->unitPrice = $unitPrice;
        $this->quantity = $quantity;
    }

}