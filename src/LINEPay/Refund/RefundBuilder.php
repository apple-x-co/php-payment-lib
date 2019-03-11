<?php
/**
 * Created by PhpStorm.
 * User: sanokouhei
 * Date: 2019-03-07
 * Time: 10:47
 */

namespace Payment\LINEPay\Refund;


use Payment\LINEPay;
use Payment\LINEPay\Refund;

class RefundBuilder
{
    /** @var LINEPay */
    private $linepay = null;

    /** @var int */
    private $amount;

    /** @var string */
    private $transaction_id;

    /**
     * RefundBuilder constructor.
     */
    public function __construct()
    {
    }

    /**
     * @param LINEPay $linepay
     *
     * @return $this
     */
    public function setLinepay($linepay)
    {
        $this->linepay = $linepay;

        return $this;
    }

    /**
     * @param int $amount
     *
     * @return $this
     */
    public function setAmount($amount)
    {
        $this->amount = $amount;

        return $this;
    }

    /**
     * @param string $transaction_id
     *
     * @return $this
     */
    public function setTransactionId($transaction_id)
    {
        $this->transaction_id = $transaction_id;

        return $this;
    }

    /**
     * @return Refund
     */
    public function build()
    {
        return new Refund(
            $this->linepay,
            $this->amount,
            $this->transaction_id
        );
    }
}