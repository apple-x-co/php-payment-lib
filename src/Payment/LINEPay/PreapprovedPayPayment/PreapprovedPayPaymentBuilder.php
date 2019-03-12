<?php
/**
 * Created by PhpStorm.
 * User: sanokouhei
 * Date: 2019-03-07
 * Time: 10:47
 */

namespace Payment\LINEPay\PreapprovedPayPayment;


use Payment\LINEPay;
use Payment\LINEPay\PreapprovedPayPayment;

class PreapprovedPayPaymentBuilder implements LINEPay\APIBuilderInterface
{
    /** @var LINEPay */
    private $linepay = null;

    /** @var string */
    private $reg_key = null;

    /** @var string */
    private $product_name = null;

    /** @var int */
    private $amount = null;

    /** @var string USD|JPY|TWD|THB */
    private $currency = null;

    /** @var string */
    private $order_id = null;

    /** @var bool */
    private $capture = true;

    /**
     * PreapprovedPayPaymentBuilder constructor.
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
     * @param string $reg_key
     *
     * @return $this
     */
    public function setRegKey($reg_key)
    {
        $this->reg_key = $reg_key;

        return $this;
    }

    /**
     * @param string $product_name
     *
     * @return $this
     */
    public function setProductName($product_name)
    {
        $this->product_name = $product_name;

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
     * @param string $order_id
     *
     * @return $this
     */
    public function setOrderId($order_id)
    {
        $this->order_id = $order_id;

        return $this;
    }

    /**
     * @param bool $capture
     *
     * @return $this
     */
    public function setCapture($capture)
    {
        $this->capture = $capture;

        return $this;
    }

    /**
     * @return PreapprovedPayPayment
     */
    public function build()
    {
        return new PreapprovedPayPayment(
            $this->linepay,
            $this->reg_key,
            $this->product_name,
            $this->amount,
            $this->currency,
            $this->order_id,
            $this->capture
        );
    }
}