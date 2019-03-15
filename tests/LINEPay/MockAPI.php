<?php
/**
 * Created by PhpStorm.
 * User: sanokouhei
 * Date: 2019-03-13
 * Time: 17:42
 */

namespace Tests\Payment\LINEPay;


use Payment\LINEPay\APIInterface;
use Payment\ResultInterface;
use Tests\Payment\LINEPay\MockAPI\MockResult;

class MockAPI implements APIInterface
{

    /**
     * @return string
     */
    public function requestMethod()
    {
        return 'GET';
    }

    /**
     * @return string
     */
    public function requestUrl()
    {
        return 'https://httpbin.org/json';
    }

    /**
     * @return array
     */
    public function requestOptions()
    {
        return [];
    }

    /**
     * @param \stdClass $responseObject
     *
     * @return ResultInterface
     */
    public function buildResult($responseObject)
    {
       return new MockResult();
    }
}