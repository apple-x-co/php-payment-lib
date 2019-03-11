<?php
/**
 * Created by PhpStorm.
 * User: sanokouhei
 * Date: 2019-03-07
 * Time: 10:47
 */

namespace Payment\LINEPay;


use Payment\LINEPay;
use Payment\LINEPay\Refund\RefundResultBuilder;
use Payment\LINEPay\Refund\RefundSuccess;
use Payment\LINEPay\Refund\RefundFailure;
use Payment\ResultInterface;

class Refund implements APIInterface
{
    /** @var LINEPay */
    private $linepay = null;

    /** @var int */
    private $amount;

    /** @var string */
    private $transaction_id;

    /**
     * Refund constructor.
     *
     * @param LINEPay $linepay
     * @param int $amount
     * @param string $transaction_id
     */
    public function __construct($linepay, $amount, $transaction_id)
    {
        $this->linepay        = $linepay;
        $this->amount         = $amount;
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
        return $this->linepay->getEndPoint()->getRefundUrl($this->transaction_id);
    }

    /**
     * @return array
     */
    public function requestOptions()
    {
        return [
            'json' => [
                'refundAmount' => $this->amount
            ]
        ];
    }

    /**
     * @param \stdClass $responseObject
     *
     * @return ResultInterface
     */
    public function buildResult($responseObject)
    {
        $builder = new RefundResultBuilder();
        $result  = $builder
            ->setApiResult($responseObject)
            ->build();

        return $result;
    }
}