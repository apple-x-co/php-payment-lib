<?php
/**
 * Created by PhpStorm.
 * User: sanokouhei
 * Date: 2019-03-11
 * Time: 11:27
 */

namespace Payment\LINEPay\Capture;


class CapturePayinfo
{
    /** @var string CREDIT_CARD|BALANCE|DISCOUNT */
    private $method;

    /** @var int */
    private $amount;

    /** @var string */
    private $credit_card_nickname;

    /** @var string */
    private $credit_card_brand;

    /**
     * @return string
     */
    public function getMethod()
    {
        return $this->method;
    }

    /**
     * @param string $method
     *
     * @return $this
     */
    public function setMethod($method)
    {
        $this->method = $method;

        return $this;
    }

    /**
     * @return int
     */
    public function getAmount()
    {
        return $this->amount;
    }

    /**
     * @param int $amount
     *
     * @return $this
     */
    public function setAmount($amount)
    {
        $this->amount = $amount;

        return $this;
    }

    /**
     * @return string
     */
    public function getCreditCardNickname()
    {
        return $this->credit_card_nickname;
    }

    /**
     * @param string $credit_card_nickname
     *
     * @return $this
     */
    public function setCreditCardNickname($credit_card_nickname)
    {
        $this->credit_card_nickname = $credit_card_nickname;

        return $this;
    }

    /**
     * @return string
     */
    public function getCreditCardBrand()
    {
        return $this->credit_card_brand;
    }

    /**
     * @param string $credit_card_brand
     *
     * @return $this
     */
    public function setCreditCardBrand($credit_card_brand)
    {
        $this->credit_card_brand = $credit_card_brand;

        return $this;
    }
}