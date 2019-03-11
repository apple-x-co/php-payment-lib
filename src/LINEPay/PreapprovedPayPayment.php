<?php
/**
 * Created by PhpStorm.
 * User: sanokouhei
 * Date: 2019-03-11
 * Time: 15:04
 */

namespace Payment\LINEPay;


use Payment\ResultInterface;

class PreapprovedPayPayment implements APIInterface
{

    /**
     * @return string
     */
    public function requestMethod()
    {
        // TODO: Implement requestMethod() method.
    }

    /**
     * @return string
     */
    public function requestUrl()
    {
        // TODO: Implement requestUrl() method.
    }

    /**
     * @return array
     */
    public function requestOptions()
    {
        // TODO: Implement requestOptions() method.
    }

    /**
     * @param \stdClass $responseObject
     *
     * @return ResultInterface
     */
    public function buildResult($responseObject)
    {
        // TODO: Implement buildResult() method.
    }
}