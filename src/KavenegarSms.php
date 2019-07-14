<?php

namespace Shetabit\KavenegarSms;

use Kavenegar\Exceptions\ApiException;
use Kavenegar\Exceptions\HttpException;
use Kavenegar\KavenegarApi;

class KavenegarSms
{
    /**
     * @var string
     */
    protected $apiKey;

    /**
     * @var string
     */
    protected $sender;

    /**
     * KavenegarSms constructor.
     */
    public function __construct()
    {
        $this->apiKey = config('kavenegarsms.api_key');
        $this->sender = config('kavenegarsms.sender');
    }

    /**
     * Send SMS with Kavenegar Api.
     *
     * @param string $mobile
     * @param string $message
     * @return array
     */
    public function send($mobile, $message)
    {
        try {
            $sms = new KavenegarApi($this->apiKey);
            $sms->send($this->sender, $mobile, $message);

            $result = [
                'success' => true,
                'message' => 'Successfully'
            ];

        } catch(ApiException $e) {
            //If webservice output not 200.
            $result = [
                'success' => false,
                'message' => 'Api Error (' . $e->getCode() . '):' . $e->errorMessage()
            ];
        } catch(HttpException $e){
            //Problem with connection to webservice
            $result = [
                'success' => false,
                'message' => 'Connection Error (' . $e->getCode() . '):' . $e->errorMessage()
            ];
        }

        return $result;
    }

    /**
     * Send Verify SMS with Kavenegar Api.
     *
     * @param string $mobile
     * @param string $token1
     * @param string $token2
     * @param string $token3
     * @param string $template
     * @return array
     */
    public function lookup($mobile, $token1, $token2 = '', $token3 = '', $template = 'verify')
    {
        try {
            $api = new KavenegarApi($this->apiKey);
            $api->VerifyLookup($mobile, $token1, $token2, $token3, $template);

            $result = [
                'success' => true,
                'message' => 'Successfully'
            ];

        } catch(ApiException $e){
            //If webservice output not 200.
            $result = [
                'success' => false,
                'message' => 'Api Error (' . $e->getCode() . '):' . $e->errorMessage()
            ];

        } catch(HttpException $e){
            //Problem with connection to webservice
            $result = [
                'success' => false,
                'message' => 'Connection Error (' . $e->getCode() . '):' . $e->errorMessage()
            ];
        }

        return $result;
    }
}