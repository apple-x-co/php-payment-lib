<?php
/**
 * Created by PhpStorm.
 * User: sanokouhei
 * Date: 2019-03-11
 * Time: 14:42
 */

namespace Payment\LINEPay\Payments;


class PaymentInfo
{
    /** @var string */
    private $transaction_id = null;

    /** @var string */
    private $transaction_date = null;

    /** @var string */
    private $transaction_type = null;

    /** @var string */
    private $product_name = null;

    /** @var string */
    private $currency = null;

    /** @var PaymentPayinfo[] */
    private $payinfos = [];

    /** @var string */
    private $order_id = null;

    /**
     * @return string
     */
    public function getTransactionId()
    {
        return $this->transaction_id;
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
     * @return string
     */
    public function getTransactionDate()
    {
        return $this->transaction_date;
    }

    /**
     * @param string $transaction_date
     *
     * @return $this
     */
    public function setTransactionDate($transaction_date)
    {
        $this->transaction_date = $transaction_date;

        return $this;
    }

    /**
     * @return string
     */
    public function getTransactionType()
    {
        return $this->transaction_type;
    }

    /**
     * @param string $transaction_type
     *
     * @return $this
     */
    public function setTransactionType($transaction_type)
    {
        $this->transaction_type = $transaction_type;

        return $this;
    }

    /**
     * @return string
     */
    public function getProductName()
    {
        return $this->product_name;
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
     * @return string
     */
    public function getCurrency()
    {
        return $this->currency;
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
     * @return PaymentPayinfo[]
     */
    public function getPayinfos()
    {
        return $this->payinfos;
    }

    /**
     * @param PaymentPayinfo $payinfo
     *
     * @return $this
     */
    public function addPayinfo($payinfo)
    {
        $this->payinfos[] = $payinfo;

        return $this;
    }

    /**
     * @return string
     */
    public function getOrderId()
    {
        return $this->order_id;
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
}