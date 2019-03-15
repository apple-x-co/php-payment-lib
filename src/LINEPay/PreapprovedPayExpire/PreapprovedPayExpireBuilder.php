<?php
/**
 * Created by PhpStorm.
 * User: sanokouhei
 * Date: 2019-03-07
 * Time: 10:47
 */

namespace Payment\LINEPay\PreapprovedPayExpire;


use Payment\LINEPay;
use Payment\LINEPay\PreapprovedPayExpire;

class PreapprovedPayExpireBuilder implements LINEPay\APIBuilderInterface
{
    /** @var LINEPay */
    private $linepay = null;

    /** @var string */
    private $reg_key = null;

    /**
     * PreapprovedPayExpireBuilder constructor.
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
     * @return PreapprovedPayExpire
     */
    public function build()
    {
        return new PreapprovedPayExpire(
            $this->linepay,
            $this->reg_key
        );
    }
}