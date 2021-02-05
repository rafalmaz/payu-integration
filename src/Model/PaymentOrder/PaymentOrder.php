<?php


namespace App\Model\PaymentOrder;


class PaymentOrder
{
    /**
     * @var string
     */
    private $notifyUrl;
    /**
     * @var string
     */
    private $customerIp;
    /**
     * @var string
     */
    private $merchantPosId;
    /**
     * @var string
     */
    private $description;
    /**
     * @var string
     */
    private $currencyCode;
    /**
     * @var int
     */
    private $totalAmount;
    /**
     * @var Buyer
     */
    private $buyer;
    /**
     * @var Product[]
     */
    private $products;

    /**
     * PaymentOrder constructor.
     * @param string $notifyUrl
     * @param string $customerIp
     * @param string $merchantPosId
     * @param string $description
     * @param string $currencyCode
     * @param int $totalAmount
     * @param Buyer $buyer
     * @param Product[] $products
     */
    public function __construct(string $notifyUrl, string $customerIp, string $merchantPosId, string $description, string $currencyCode, int $totalAmount, Buyer $buyer, array $products) {
        $this->notifyUrl = $notifyUrl;
        $this->customerIp = $customerIp;
        $this->merchantPosId = $merchantPosId;
        $this->description = $description;
        $this->currencyCode = $currencyCode;
        $this->totalAmount = $totalAmount;
        $this->buyer = $buyer;
        $this->products = $products;
    }
}