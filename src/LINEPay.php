<?php
/**
 * Created by PhpStorm.
 * User: sanokouhei
 * Date: 2019-03-07
 * Time: 10:46
 */

namespace Payment;


use Payment\LINEPay\APIInterface;
use Payment\LINEPay\EndPoint;

class LINEPay
{
    const REAL_DOMAIN = 'api-pay.line.me';
    const SANDBOX_DOMAIN = 'sandbox-api-pay.line.me';

    /** @var string */
    private $channel_id;

    /** @var string */
    private $channel_secret;

    /** @var EndPoint */
    private $endpoint;

    /**
     * LINEPay constructor.
     *
     * @param string $channel_id
     * @param string $channel_secret
     * @param string $environment
     */
    public function __construct($channel_id, $channel_secret, $environment = 'prod')
    {
        $this->channel_id     = $channel_id;
        $this->channel_secret = $channel_secret;
        $this->endpoint       = new EndPoint($environment === 'prod' ? $this::REAL_DOMAIN : $this::SANDBOX_DOMAIN);
    }

    /**
     * @return mixed
     */
    public function getChannelId()
    {
        return $this->channel_id;
    }

    /**
     * @return mixed
     */
    public function getChannelSecret()
    {
        return $this->channel_secret;
    }

    /**
     * @return EndPoint
     */
    public function getEndPoint()
    {
        return $this->endpoint;
    }

    /**
     * @param APIInterface $api
     *
     * @return ResultInterface
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function request($api)
    {
        $client = new \GuzzleHttp\Client([
            \GuzzleHttp\RequestOptions::VERIFY => false
        ]);

        $options = [
            'headers' => [
                'Content-Type'         => 'application/json; charset=UTF-8',
                'X-LINE-ChannelId'     => $this->getChannelId(),
                'X-LINE-ChannelSecret' => $this->getChannelSecret()
            ]
        ];

        $response = $client->request(
            $api->requestMethod(),
            $api->requestUrl(),
            array_merge($options, $api->requestOptions())
        );

        $responseObject = \GuzzleHttp\json_decode($response->getBody()->getContents());

        return $api->buildResult($responseObject);
    }
}