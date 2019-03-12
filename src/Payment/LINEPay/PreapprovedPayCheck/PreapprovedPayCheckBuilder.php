<?php
/**
 * Created by PhpStorm.
 * User: sanokouhei
 * Date: 2019-03-07
 * Time: 10:47
 */

namespace Payment\LINEPay\PreapprovedPayCheck;


use Payment\LINEPay;
use Payment\LINEPay\PreapprovedPayCheck;

class PreapprovedPayCheckBuilder implements LINEPay\APIBuilderInterface
{
    /** @var LINEPay */
    private $linepay = null;

    /** @var string */
    private $reg_key = null;

    /** @var bool */
    private $credit_card_auth = false;

    /**
     * PreapprovedPayCheckBuilder constructor.
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
     * @param string $reg_key
     *
     * @return $this
     */
    public function setRegKey($reg_key)
    {
        $this->reg_key = $reg_key;

        return $this;
    }

    /**
     * @param bool $credit_card_auth
     *
     * @return $this
     */
    public function setCreditCardAuth($credit_card_auth)
    {
        $this->credit_card_auth = $credit_card_auth;

        return $this;
    }

    /**
     * @return PreapprovedPayCheck
     */
    public function build()
    {
        return new PreapprovedPayCheck(
            $this->linepay,
            $this->reg_key,
            $this->credit_card_auth
        );
    }
}