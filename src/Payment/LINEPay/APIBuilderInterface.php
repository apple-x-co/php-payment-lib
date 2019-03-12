<?php
/**
 * Created by PhpStorm.
 * User: sanokouhei
 * Date: 2019-03-12
 * Time: 09:47
 */

namespace Payment\LINEPay;


interface APIBuilderInterface
{
    /**
     * @return APIInterface
     */
    public function build();
}