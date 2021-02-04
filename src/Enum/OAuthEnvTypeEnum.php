<?php


namespace App\Enum;


use ReflectionClass;

class OAuthEnvTypeEnum
{
    const __default = self::DEV;

    const DEV = 'https://secure.snd.payu.com/pl/standard/user/oauth/authorize';
    const PROD = '';

    /**
     * @param string $env
     * @return string
     */
    public static function getAuthorizeUrl(string $env) : string {
        $reflection = new ReflectionClass(self::class);

        foreach ($reflection->getConstants() as $key => $value) {
            if($env == $key) {
                return $value;
            }
        }
        return self::DEV;
    }
}