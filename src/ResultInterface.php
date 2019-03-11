<?php
/**
 * Created by PhpStorm.
 * User: sanokouhei
 * Date: 2019-03-07
 * Time: 11:35
 */

namespace Payment;


interface ResultInterface
{
    /**
     * @return bool
     */
    public function isSuccess();
}