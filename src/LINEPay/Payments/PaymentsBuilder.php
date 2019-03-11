<?php
/**
 * Created by PhpStorm.
 * User: sanokouhei
 * Date: 2019-03-07
 * Time: 10:47
 */

namespace Payment\LINEPay\Payments;


use Payment\LINEPay;
use Payment\LINEPay\Payments;

class PaymentsBuilder
{
    /** @var LINEPay */
    private $linepay = null;

    /** @var string[] */
    private $transaction_ids;

    /** @var string[] */
    private $order_ids;

    /**
     * PaymentsBuilder constructor.
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
     * @param string[] $transaction_ids
     *
     * @return $this
     */
    public function setTransactionIds($transaction_ids)
    {
        $this->transaction_ids = $transaction_ids;

        return $this;
    }

    /**
     * @param string[] $order_ids
     *
     * @return $this
     */
    public function setOrderIds($order_ids)
    {
        $this->order_ids = $order_ids;

        return $this;
    }

    /**
     * @return Payments
     */
    public function build()
    {
        return new Payments(
            $this->linepay,
            $this->transaction_ids,
            $this->order_ids
        );
    }
}