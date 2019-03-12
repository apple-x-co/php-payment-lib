<?php
/**
 * Created by PhpStorm.
 * User: sanokouhei
 * Date: 2019-03-12
 * Time: 09:50
 */

namespace Payment\LINEPay\Authorizations;


class AuthorizationInfo
{
    /** @var string */
    private $transaction_id = null;

    /** @var string */
    private $transaction_date = null;

    /** @var string PAYMENT|PAYMENT_REFUND|PARTIAL_REFUND */
    private $transaction_type = null;

    /** @var string AUTHORIZATION|VOIDED_AUTHORIZATION|EXPIRED_AUTHORIZATION */
    private $pay_status = null;

    /** @var AuthorizationPayinfo[] */
    private $payinfos = [];

    /** @var string */
    private $product_name = null;

    /** @var string */
    private $currency = null;

    /** @var string */
    private $order_id = null;

    /** @var string */
    private $authorization_expire_date = null;

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
    public function getPayStatus()
    {
        return $this->pay_status;
    }

    /**
     * @param string $pay_status
     *
     * @return $this
     */
    public function setPayStatus($pay_status)
    {
        $this->pay_status = $pay_status;

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
     * @return AuthorizationPayinfo[]
     */
    public function getPayinfos()
    {
        return $this->payinfos;
    }

    /**
     * @param AuthorizationPayinfo $payinfo
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

    /**
     * @return string
     */
    public function getAuthorizationExpireDate()
    {
        return $this->authorization_expire_date;
    }

    /**
     * @param string $authorization_expire_date
     *
     * @return $this
     */
    public function setAuthorizationExpireDate($authorization_expire_date)
    {
        $this->authorization_expire_date = $authorization_expire_date;

        return $this;
    }
}