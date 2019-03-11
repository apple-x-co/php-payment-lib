<?php
/**
 * Created by PhpStorm.
 * User: sanokouhei
 * Date: 2019-03-07
 * Time: 11:36
 */

namespace Payment\LINEPay\Refund;


use Payment\ResultInterface;

class RefundSuccess implements ResultInterface
{
    /** @var int */
    private $refund_transaction_id = null;

    /** @var string */
    private $refund_transaction_date = null;

    /**
     * @return bool
     */
    public function isSuccess()
    {
        return true;
    }

    /**
     * @param int $refund_transaction_id
     *
     * @return $this
     */
    public function setRefundTransactionId($refund_transaction_id)
    {
        $this->refund_transaction_id = $refund_transaction_id;

        return $this;
    }

    /**
     * @param string $refund_transaction_date
     *
     * @return $this
     */
    public function setRefundTransactionDate($refund_transaction_date)
    {
        $this->refund_transaction_date = $refund_transaction_date;

        return $this;
    }
}