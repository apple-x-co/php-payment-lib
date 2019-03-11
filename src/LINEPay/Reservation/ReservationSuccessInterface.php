<?php
/**
 * Created by PhpStorm.
 * User: sanokouhei
 * Date: 2019-03-07
 * Time: 11:36
 */

namespace Payment\LINEPay\Reservation;


use Payment\ResultSuccessInterface;

interface ReservationSuccessInterface extends ResultSuccessInterface
{
    /**
     * @param string $url
     *
     * @return $this
     */
    public function setPaymentUrl($url);

    /**
     * @return string
     */
    public function getPaymentUrl();

    /**
     * @param string $url
     *
     * @return $this
     */
    public function setPaymentUrlScheme($url);

    /**
     * @return string
     */
    public function getPaymentUrlScheme();

    /**
     * @param string $transaction_id
     *
     * @return $this
     */
    public function setTransactionId($transaction_id);

    /**
     * @return string
     */
    public function getTransactionId();

    /**
     * @param string $access_token
     *
     * @return $this
     */
    public function setAccessToken($access_token);

    /**
     * @return string
     */
    public function getAccessToken();
}