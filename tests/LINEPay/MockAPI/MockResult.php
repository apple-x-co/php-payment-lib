<?php
/**
 * Created by PhpStorm.
 * User: sanokouhei
 * Date: 2019-03-13
 * Time: 17:54
 */

namespace Tests\Payment\LINEPay\MockAPI;

use Payment\ResultInterface;

class MockResult implements ResultInterface
{
    /**
     * @return bool
     */
    public function isSuccess()
    {
        return true;
    }
}