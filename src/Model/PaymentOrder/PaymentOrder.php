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
     * @var string
     */
    private $continueUrl;

    /**
     * PaymentOrder constructor.
     * @param string $notifyUrl
     * @param string $continueUrl
     * @param string $customerIp
     * @param string $merchantPosId
     * @param string $description
     * @param string $currencyCode
     * @param int $totalAmount
     * @param Buyer $buyer
     * @param Product[] $products
     */
    public function __construct(string $notifyUrl, string $continueUrl, string $customerIp, string $merchantPosId, string $description, string $currencyCode, int $totalAmount, Buyer $buyer, array $products) {
        $this->notifyUrl = $notifyUrl;
        $this->customerIp = $customerIp;
        $this->merchantPosId = $merchantPosId;
        $this->description = $description;
        $this->currencyCode = $currencyCode;
        $this->totalAmount = $totalAmount;
        $this->buyer = $buyer;
        $this->products = $products;
        $this->continueUrl = $continueUrl;
    }

    /**
     * @return array
     */
    public function getArray() : array {

        $products = [];
        foreach ($this->products as $product) {
            $products[] = [
                'name' => $product->getName(),
                'unitPrice' => $product->getUnitPrice(),
                'quantity' => $product->getQuantity()
            ];
        }

        return [
            'notifyUrl' => $this->notifyUrl,
            'continueUrl' => $this->continueUrl,
            'customerIp' => $this->customerIp,
            'merchantPosId' => $this->merchantPosId,
            'description' => $this->description,
            'currencyCode' => $this->currencyCode,
            'totalAmount' => $this->totalAmount,
            'buyer' => [
                'email' => $this->buyer->getEmail(),
                'phone' => $this->buyer->getPhone(),
                'firstName' => $this->buyer->getFirstName(),
                'lastName' => $this->buyer->getLastName(),
                'language' => $this->buyer->getLanguage()
            ],
            'products' => $products
        ];
    }


}