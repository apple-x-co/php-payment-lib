<?php
/**
 * Created by PhpStorm.
 * User: sanokouhei
 * Date: 2019-03-11
 * Time: 14:43
 */

namespace Payment\LINEPay\Payments;


class PaymentPayinfo
{
    /** @var string */
    private $method = null;

    /** @var int */
    private $amount = null;

    /**
     * @return string
     */
    public function getMethod()
    {
        return $this->method;
    }

    /**
     * @param string $method
     *
     * @return $this
     */
    public function setMethod($method)
    {
        $this->method = $method;

        return $this;
    }

    /**
     * @return int
     */
    public function getAmount()
    {
        return $this->amount;
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
}