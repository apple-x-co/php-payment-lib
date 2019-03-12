<?php
/**
 * Created by PhpStorm.
 * User: sanokouhei
 * Date: 2019-03-07
 * Time: 11:36
 */

namespace Payment\LINEPay\PreapprovedPayPayment;


use Payment\ResultInterface;

class PreapprovedPayPaymentSuccess implements ResultInterface
{
    /** @var string */
    private $transaction_id;

    /** @var string */
    private $transaction_date;

    /** @var string */
    private $authorization_expire_date;

    /**
     * @return bool
     */
    public function isSuccess()
    {
        return true;
    }

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