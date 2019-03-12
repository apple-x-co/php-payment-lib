<?php
/**
 * Created by PhpStorm.
 * User: sanokouhei
 * Date: 2019-03-07
 * Time: 11:32
 */

namespace Payment\LINEPay\PreapprovedPayCheck;


use Payment\LINEPay\APIResultBuilderInterface;
use Payment\ResultInterface;

class PreapprovedPayCheckResultBuilder implements APIResultBuilderInterface
{
    /** @var \stdClass */
    private $api_result;

    public function __construct()
    {
    }

    /**
     * @param \stdClass $api_result
     *
     * @return $this
     */
    public function setApiResult($api_result)
    {
        $this->api_result = $api_result;

        return $this;
    }

    /**
     * @return ResultInterface
     */
    public function build()
    {
        if ($this->api_result->returnCode === '0000') {
            $success = new PreapprovedPayCheckSuccess();

            return $success;
        }

        $failure = new PreapprovedPayCheckFailure();
        $failure
            ->setFailureCode($this->api_result->returnCode)
            ->setFailureReason($this->api_result->returnMessage);

        return $failure;
    }
}