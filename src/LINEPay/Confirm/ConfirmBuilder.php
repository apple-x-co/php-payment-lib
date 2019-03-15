<?php
/**
 * Created by PhpStorm.
 * User: sanokouhei
 * Date: 2019-03-07
 * Time: 10:47
 */

namespace Payment\LINEPay\Confirm;


use Payment\LINEPay;
use Payment\LINEPay\Confirm;

class ConfirmBuilder implements LINEPay\APIBuilderInterface
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
     * ConfirmBuilder constructor.
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
     * @param string $currency
     *
     * @return $this
     */
    public function setCurrency($currency)
    {
        $this->currency = $currency;

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
     * @return Confirm
     */
    public function build()
    {
        return new Confirm(
            $this->linepay,
            $this->amount,
            $this->currency,
            $this->transaction_id
        );
    }
}