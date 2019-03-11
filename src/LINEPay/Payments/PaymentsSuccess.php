<?php
/**
 * Created by PhpStorm.
 * User: sanokouhei
 * Date: 2019-03-07
 * Time: 11:36
 */

namespace Payment\LINEPay\Payments;


use Payment\ResultInterface;

class PaymentsSuccess implements ResultInterface
{
    /** @var PaymentInfo[] */
    private $infos = [];

    /**
     * @return bool
     */
    public function isSuccess()
    {
        return true;
    }

    /**
     * @return PaymentInfo[]
     */
    public function getInfos()
    {
        return $this->infos;
    }

    /**
     * @param PaymentInfo $info
     */
    public function addInfo($info)
    {
        $this->infos[] = $info;
    }
}