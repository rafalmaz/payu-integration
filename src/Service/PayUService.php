<?php


namespace App\Service;


use App\Model\Client;
use App\Model\PaymentOrder\PaymentOrder;
use App\Model\Response\CreateOrderResponse;
use App\Model\Response\OAuthTokenResponse;

class PayUService
{
    /**
     * @var Client
     */
    private $client;
    /**
     * @var string
     */
    private $token;

    /**
     * PayUService constructor.
     * @param Client $client
     * @param string $token
     */
    public function __construct(Client $client, string $token) {
        $this->client = $client;
        $this->token = $token;
    }

    /**
     * @param PaymentOrder $order
     * @return CreateOrderResponse
     */
    public function createNewPaymentOrder(PaymentOrder $order) : CreateOrderResponse {
        try {
            $authorization = "Authorization: Bearer " . $this->token;
            $post = json_encode($order,  JSON_FORCE_OBJECT);

            $ch = curl_init('https://secure.snd.payu.com/api/v2_1/orders');
            curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json' , $authorization ));
            curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_POSTFIELDS,$post);
            curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);

            $response = curl_exec($ch);
            $response = json_decode($response);

            curl_close($ch);
        }
        catch (\Exception $e) {
            return new CreateOrderResponse(true, $e->getMessage());
        }

        //  TODO Add correct payments

        if(isset($response->status->severity) && $response->status->severity == 'ERROR') {
            return new CreateOrderResponse(isset($response->status->severity), $response->status->statusDesc);
        }


        return new CreateOrderResponse(false, '');
    }
}