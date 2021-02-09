<?php


namespace App\Service;


use App\Enum\OAuthEnvTypeEnum;
use App\Model\Client;
use App\Model\Response\OAuthTokenResponse;

class OAuthService
{
    /**
     * @var Client
     */
    private $client;

    /**
     * @var string
     */
    private $authorizeUrl;

    /**
     * OAuthService constructor.
     * @param Client $client
     * @param string $env
     */
    public function __construct(Client $client, string $env) {
        $this->client = $client;
        $this->authorizeUrl = OAuthEnvTypeEnum::getAuthorizeUrl($env);
    }

    /**
     * @return OAuthTokenResponse
     */
    public function getToken() : OAuthTokenResponse {
        try {
            $post = [
                'grant_type' => 'client_credentials',
                'client_id' => $this->client->getClientId(),
                'client_secret'   => $this->client->getClientSecret(),
            ];

            $data = http_build_query($post, '', '&');

            $ch = curl_init($this->authorizeUrl);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_POSTFIELDS, $data);

            $response = curl_exec($ch);
            $response = json_decode($response);

            curl_close($ch);
        }
        catch (\Exception $e) {
            return new OAuthTokenResponse(false, $e->getMessage(), '', 0);
        }

        if(isset($response->error)) {
            return new OAuthTokenResponse(isset($response->error), $response->error_description, '', 0);
        }

        return new OAuthTokenResponse(false, '', $response->access_token, $response->expires_in);
    }
}