<?php
/**
 * Created by PhpStorm.
 * User: sanokouhei
 * Date: 2019-03-07
 * Time: 11:32
 */

namespace Payment\LINEPay\Authorizations;


use Payment\LINEPay\APIResultBuilderInterface;
use Payment\ResultInterface;

class AuthorizationsResultBuilder implements APIResultBuilderInterface
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
            $success = new AuthorizationsSuccess();

            foreach ($this->api_result->info as $info) {
                $authorizationInfo = new AuthorizationInfo();
                $authorizationInfo
                    ->setTransactionId($info->transactionId)
                    ->setTransactionDate($info->transactionDate)
                    ->setTransactionType($info->transactionType)
                    ->setPayStatus($info->payStatus)
                    ->setProductName($info->productName)
                    ->setCurrency($info->currency)
                    ->setOrderId($info->orderId)
                    ->setAuthorizationExpireDate($info->authorizationExpireDate);

                foreach ($info->payInfo as $payinfo) {
                    $authorizationPayinfo = new AuthorizationPayinfo();
                    $authorizationPayinfo
                        ->setMethod($payinfo->method)
                        ->setAmount($payinfo->amount);

                    $authorizationInfo->addPayinfo($authorizationPayinfo);
                }

                $success->addInfo($authorizationInfo);
            }

            return $success;
        }

        $failure = new AuthorizationsFailure();
        $failure
            ->setFailureCode($this->api_result->returnCode)
            ->setFailureReason($this->api_result->returnMessage);

        return $failure;
    }
}