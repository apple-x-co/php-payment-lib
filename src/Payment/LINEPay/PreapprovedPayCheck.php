<?php
/**
 * Created by PhpStorm.
 * User: sanokouhei
 * Date: 2019-03-11
 * Time: 15:04
 */

namespace Payment\LINEPay;


use Payment\LINEPay;
use Payment\LINEPay\PreapprovedPayCheck\PreapprovedPayCheckResultBuilder;
use Payment\ResultInterface;

class PreapprovedPayCheck implements APIInterface
{
    /** @var LINEPay */
    private $linepay = null;

    /** @var string */
    private $reg_key = null;

    /** @var bool */
    private $credit_card_auth = false;

    /**
     * PreapprovedPayPayment constructor.
     *
     * @param LINEPay $linepay
     * @param string $reg_key
     * @param bool $credit_card_auth
     */
    public function __construct(
        $linepay,
        $reg_key,
        $credit_card_auth
    ) {
        $this->linepay          = $linepay;
        $this->reg_key          = $reg_key;
        $this->credit_card_auth = $credit_card_auth;
    }

    /**
     * @return string
     */
    public function requestMethod()
    {
        return 'GET';
    }

    /**
     * @return string
     */
    public function requestUrl()
    {
        $query_string = http_build_query([
            'creditCardAuth' => $this->credit_card_auth ? 'true' : 'false'
        ]);

        return $this->linepay->getEndPoint()->getPreapprovedPayCheckUrl($this->reg_key) . '?' . $query_string;
    }

    /**
     * @return array
     */
    public function requestOptions()
    {
        return [];
    }

    /**
     * @param \stdClass $responseObject
     *
     * @return ResultInterface
     */
    public function buildResult($responseObject)
    {
        $builder = new PreapprovedPayCheckResultBuilder();
        $result  = $builder
            ->setApiResult($responseObject)
            ->build();

        return $result;
    }
}