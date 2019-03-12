<?php
/**
 * Created by PhpStorm.
 * User: sanokouhei
 * Date: 2019-03-11
 * Time: 15:04
 */

namespace Payment\LINEPay;


use Payment\LINEPay;
use Payment\LINEPay\PreapprovedPayExpire\PreapprovedPayExpireResultBuilder;
use Payment\ResultInterface;

class PreapprovedPayExpire implements APIInterface
{
    /** @var LINEPay */
    private $linepay = null;

    /** @var string */
    private $reg_key = null;

    /**
     * PreapprovedPayPayment constructor.
     *
     * @param LINEPay $linepay
     * @param string $reg_key
     */
    public function __construct(
        $linepay,
        $reg_key
    ) {
        $this->linepay          = $linepay;
        $this->reg_key          = $reg_key;
    }

    /**
     * @return string
     */
    public function requestMethod()
    {
        return 'POST';
    }

    /**
     * @return string
     */
    public function requestUrl()
    {
        return $this->linepay->getEndPoint()->getPreapprovedPayExpireUrl($this->reg_key);
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
        $builder = new PreapprovedPayExpireResultBuilder();
        $result  = $builder
            ->setApiResult($responseObject)
            ->build();

        return $result;
    }
}