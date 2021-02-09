<?php


namespace App\Service;


use App\Model\PaymentOrder\PaymentOrder;

class SignatureService
{
    const ALGORITHM = 'SHA-256';

    /**
     * @var string
     */
    private $secondKey;

    /**
     * @var string
     */
    private $posId;

    /**
     * SignatureService constructor.
     * @param string $secondKey
     * @param string $posId
     */
    public function __construct(string $secondKey, string $posId) {
        $this->secondKey = $secondKey;
        $this->posId = $posId;
    }

    /**
     * @param PaymentOrder $order
     * @return string
     */
    public function generate(PaymentOrder $order) : string {
        $arrayOrder = $order->getArray();
        ksort($arrayOrder);
        $query = $this->getQueryFromSortedArray($arrayOrder);
//        $data = urldecode(http_build_query($arrayOrder));
        $query .= $this->secondKey;
        return "signature=" . hash('sha256', $query) . ";algorithm=" . self::ALGORITHM . ";sender=" . $this->posId;
    }

    public function getQueryFromSortedArray(array $sortedArray, string $query = '') : string {
        foreach ($sortedArray as $key => $value) {
            if(is_array($value)) {
                foreach ($value as $key1=> $value2) {
                    $query .= $this->getQueryFromSortedArray($value, $query);
                }
            }
            else {
                $query .= $key . '=' . $value . '&';
            }
        }
        return $query;
    }

}