<?php
/**
 * Created by PhpStorm.
 * User: sanokouhei
 * Date: 2019-03-07
 * Time: 11:32
 */

namespace Payment\LINEPay\Capture;


use Payment\LINEPay\APIResultBuilderInterface;
use Payment\ResultInterface;

class CaptureResultBuilder implements APIResultBuilderInterface
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
            $success = new CaptureSuccess();
            $success
                ->setOrderId($this->api_result->info->orderId)
                ->setTransactionId($this->api_result->info->transactionId);

            foreach ($this->api_result->info->payInfo as $pay_info) {
                $capturePayinfo = new CapturePayinfo();
                $capturePayinfo
                    ->setMethod($pay_info->method)
                    ->setAmount($pay_info->amount);

                $success->addPayInfo($capturePayinfo);
            }

            return $success;
        }

        $failure = new CaptureFailure();
        $failure
            ->setFailureCode($this->api_result->returnCode)
            ->setFailureReason($this->api_result->returnMessage);

        return $failure;
    }
}