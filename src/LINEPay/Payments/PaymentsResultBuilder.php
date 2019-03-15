<?php
/**
 * Created by PhpStorm.
 * User: sanokouhei
 * Date: 2019-03-07
 * Time: 11:32
 */

namespace Payment\LINEPay\Payments;


use Payment\LINEPay\APIResultBuilderInterface;
use Payment\ResultInterface;

class PaymentsResultBuilder implements APIResultBuilderInterface
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
            $success = new PaymentsSuccess();

            foreach ($this->api_result->info as $info) {
                $paymentInfo = new PaymentInfo();
                $paymentInfo
                    ->setTransactionId($info->transactionId)
                    ->setTransactionDate($info->transactionDate)
                    ->setTransactionType($info->transactionType)
                    ->setProductName($info->productName)
                    ->setCurrency($info->currency)
                    ->setOrderId($info->orderId);

                foreach ($info->payInfo as $payinfo) {
                    $paymentPayinfo = new PaymentPayinfo();
                    $paymentPayinfo
                        ->setMethod($payinfo->method)
                        ->setAmount($payinfo->amount);

                    $paymentInfo->addPayinfo($paymentPayinfo);
                }

                $success->addInfo($paymentInfo);
            }

            return $success;
        }

        $failure = new PaymentsFailure();
        $failure
            ->setFailureCode($this->api_result->returnCode)
            ->setFailureReason($this->api_result->returnMessage);

        return $failure;
    }
}