<?php
/**
 * Created by PhpStorm.
 * User: sanokouhei
 * Date: 2019-03-07
 * Time: 10:47
 */

namespace Payment\LINEPay;


use Payment\LINEPay;
use Payment\LINEPay\Confirm\ConfirmResultBuilder;
use Payment\ResultInterface;

class Confirm implements APIInterface
{
    /** @var LINEPay */
    private $linepay = null;

    /** @var int */
    private $amount;

    /** @var string */
    private $currency;

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
    public function __construct($linepay, $amount, $currency, $transaction_id)
    {
        $this->linepay        = $linepay;
        $this->amount         = $amount;
        $this->currency       = $currency;
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
        return $this->linepay->getEndPoint()->getConfirmUrl($this->transaction_id);
    }

    /**
     * @return array
     */
    public function requestOptions()
    {
        return [
            'json' => [
                'amount'   => $this->amount,
                'currency' => $this->currency
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
        $builder = new ConfirmResultBuilder();
        $result  = $builder
            ->setApiResult($responseObject)
            ->build();

        return $result;
    }
}