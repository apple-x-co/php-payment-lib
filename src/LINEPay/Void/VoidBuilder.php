<?php
/**
 * Created by PhpStorm.
 * User: sanokouhei
 * Date: 2019-03-07
 * Time: 10:47
 */

namespace Payment\LINEPay\Void;


use Payment\LINEPay;
use Payment\LINEPay\Void;

class VoidBuilder implements LINEPay\APIBuilderInterface
{
    /** @var LINEPay */
    private $linepay = null;

    /** @var string */
    private $transaction_id;

    /**
     * VoidBuilder constructor.
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
     * @return Void
     */
    public function build()
    {
        return new Void(
            $this->linepay,
            $this->transaction_id
        );
    }
}