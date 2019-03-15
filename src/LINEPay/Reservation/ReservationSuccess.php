<?php
/**
 * Created by PhpStorm.
 * User: sanokouhei
 * Date: 2019-03-07
 * Time: 11:36
 */

namespace Payment\LINEPay\Reservation;


use Payment\ResultInterface;

class ReservationSuccess implements ResultInterface, ReservationSuccessInterface
{
    /** @var string */
    private $payment_url;

    /** @var string */
    private $payment_url_scheme;

    /** @var string */
    private $transaction_id;

    /** @var string */
    private $access_token;

    /**
     * @return bool
     */
    public function isSuccess()
    {
        return true;
    }

    /**
     * @param string $url
     *
     * @return $this
     */
    public function setPaymentUrl($url)
    {
        $this->payment_url = $url;

        return $this;
    }

    /**
     * @return string
     */
    public function getPaymentUrl()
    {
        return $this->payment_url;
    }

    /**
     * @param string $url
     *
     * @return $this
     */
    public function setPaymentUrlScheme($url)
    {
        $this->payment_url_scheme = $url;

        return $this;
    }

    /**
     * @return string
     */
    public function getPaymentUrlScheme()
    {
        return $this->payment_url_scheme;
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
    public function getTransactionId()
    {
        return $this->transaction_id;
    }

    /**
     * @param string $access_token
     *
     * @return $this
     */
    public function setAccessToken($access_token)
    {
        $this->access_token = $access_token;

        return $this;
    }

    /**
     * @return string
     */
    public function getAccessToken()
    {
        return $this->access_token;
    }
}