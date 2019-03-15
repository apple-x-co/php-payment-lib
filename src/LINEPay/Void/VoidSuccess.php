<?php
/**
 * Created by PhpStorm.
 * User: sanokouhei
 * Date: 2019-03-07
 * Time: 11:36
 */

namespace Payment\LINEPay\Void;


use Payment\ResultInterface;

class VoidSuccess implements ResultInterface
{
    /**
     * @return bool
     */
    public function isSuccess()
    {
        return true;
    }
}