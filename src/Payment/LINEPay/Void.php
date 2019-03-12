<?php
/**
 * Created by PhpStorm.
 * User: sanokouhei
 * Date: 2019-03-11
 * Time: 15:00
 */

namespace Payment\LINEPay;


use Payment\LINEPay;
use Payment\LINEPay\Void\VoidResultBuilder;
use Payment\ResultInterface;

class Void implements APIInterface
{
    /** @var LINEPay */
    private $linepay = null;

    /** @var string */
    private $transaction_id;

    /**
     * Confirm constructor.
     *
     * @param LINEPay $linepay
     * @param int $amount
     * @param string $currency
     * @param string $transaction_id
     */
    public function __construct($linepay, $transaction_id)
    {
        $this->linepay        = $linepay;
        $this->transaction_id = $transaction_id;
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
        return $this->linepay->getEndPoint()->getVoidUrl($this->transaction_id);
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
        $builder = new VoidResultBuilder();
        $result  = $builder
            ->setApiResult($responseObject)
            ->build();

        return $result;
    }
}