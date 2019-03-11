<?php
/**
 * Created by PhpStorm.
 * User: sanokouhei
 * Date: 2019-03-07
 * Time: 11:32
 */

namespace Payment\LINEPay\Confirm;


use Payment\ResultInterface;

class ConfirmResultBuilder
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
            $success = new ConfirmSuccess();
            $success
                ->setOrderId($this->api_result->info->orderId)
                ->setTransactionId($this->api_result->info->transactionId);

            if (property_exists($this->api_result->info, 'authorizationExpireDate')) {
                $success->setAuthorizationExpireDate($this->api_result->info->authorizationExpireDate);
            }
            if (property_exists($this->api_result->info, 'regKey')) {
                $success->setRegKey($this->api_result->info->regKey);
            }

            foreach ($this->api_result->info->payInfo as $pay_info) {
                $confirmPayinfo = new ConfirmPayinfo();
                $confirmPayinfo
                    ->setMethod($pay_info->method)
                    ->setAmount($pay_info->amount);

                if (property_exists($pay_info, 'creditCardNickname')) {
                    $confirmPayinfo->setCreditCardNickname($pay_info->creditCardNickname);
                }
                if (property_exists($pay_info, 'creditCardBrand')) {
                    $confirmPayinfo->setCreditCardBrand($pay_info->creditCardBrand);
                }
                $success->addPayInfo($confirmPayinfo);
            }

            return $success;
        }

        $failure = new ConfirmFailure();
        $failure
            ->setFailureCode($this->api_result->returnCode)
            ->setFailureReason($this->api_result->returnMessage);

        return $failure;
    }
}