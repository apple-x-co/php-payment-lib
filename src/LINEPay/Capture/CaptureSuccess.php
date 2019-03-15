<?php
/**
 * Created by PhpStorm.
 * User: sanokouhei
 * Date: 2019-03-07
 * Time: 11:36
 */

namespace Payment\LINEPay\Capture;


use Payment\ResultInterface;

class CaptureSuccess implements ResultInterface
{
    /** @var string */
    private $order_id = null;

    /** @var string */
    private $transaction_id = null;

    /** @var CapturePayinfo[] */
    private $capture_payinfos = null;

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
     * @param CapturePayinfo $capturePayinfo
     *
     * @return $this
     */
    public function addPayInfo($capturePayinfo)
    {
        $this->capture_payinfos[] = $capturePayinfo;

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
     * @return CapturePayinfo[]
     */
    public function getPayinfos()
    {
        return $this->capture_payinfos;
    }
}