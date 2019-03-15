<?php
/**
 * Created by PhpStorm.
 * User: sanokouhei
 * Date: 2019-03-11
 * Time: 09:40
 */

namespace Payment\LINEPay;


use Payment\LINEPay;
use Payment\ResultInterface;

interface APIInterface
{
    /**
     * @return string
     */
    public function requestMethod();

    /**
     * @return string
     */
    public function requestUrl();

    /**
     * @return array
     */
    public function requestOptions();

    /**
     * @param \stdClass $responseObject
     *
     * @return ResultInterface
     */
    public function buildResult($responseObject);
}