<?php


namespace App\Model\PaymentOrder;


class Product
{
    /**
     * @var string
     */
    private $name;
    /**
     * @var string
     */
    private $unitPrice;
    /**
     * @var string
     */
    private $quantity;

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

    /**
     * @return string
     */
    public function getName(): string {
        return $this->name;
    }

    /**
     * @return string
     */
    public function getUnitPrice(): string {
        return $this->unitPrice;
    }

    /**
     * @return string
     */
    public function getQuantity(): string {
        return $this->quantity;
    }
}