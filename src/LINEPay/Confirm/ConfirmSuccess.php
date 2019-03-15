<?php
/**
 * Created by PhpStorm.
 * User: sanokouhei
 * Date: 2019-03-07
 * Time: 11:36
 */

namespace Payment\LINEPay\Confirm;


use Payment\ResultInterface;

class ConfirmSuccess implements ResultInterface
{
    /** @var string */
    private $order_id = null;

    /** @var string */
    private $transaction_id = null;

    /** @var string */
    private $authorization_expire_date = null;

    /** @var ConfirmPayinfo[] */
    private $confirm_payinfos = null;

    /** @var string */
    private $regKey = null;

    /**
     * @return bool
     */
    public function isSuccess()
    {
        return true;
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
     * @param string $authorization_expire_date
     *
     * @return $this
     */
    public function setAuthorizationExpireDate($authorization_expire_date)
    {
        $this->authorization_expire_date = $authorization_expire_date;

        return $this;
    }

    /**
     * @param ConfirmPayinfo $confirmPayinfo
     *
     * @return $this
     */
    public function addPayInfo($confirmPayinfo)
    {
        $this->confirm_payinfos[] = $confirmPayinfo;

        return $this;
    }

    /**
     * @param string $regKey
     *
     * @return $this
     */
    public function setRegKey($regKey)
    {
        $this->regKey = $regKey;

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
     * @return string
     */
    public function getTransactionId()
    {
        return $this->transaction_id;
    }

    /**
     * @return string
     */
    public function getAuthorizationExpireDate()
    {
        return $this->authorization_expire_date;
    }

    /**
     * @return ConfirmPayinfo[]
     */
    public function getPayinfos()
    {
        return $this->confirm_payinfos;
    }

    /**
     * @return string
     */
    public function getRegKey()
    {
        return $this->regKey;
    }
}