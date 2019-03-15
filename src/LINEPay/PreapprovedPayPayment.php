<?php
/**
 * Created by PhpStorm.
 * User: sanokouhei
 * Date: 2019-03-07
 * Time: 10:47
 */

namespace Payment\LINEPay;


use Payment\LINEPay;
use Payment\LINEPay\PreapprovedPayPayment\PreapprovedPayPaymentResultBuilder;
use Payment\ResultInterface;

class PreapprovedPayPayment implements APIInterface
{
    /** @var LINEPay */
    private $linepay = null;

    /** @var string */
    private $reg_key = null;

    /** @var string */
    private $product_name = null;

    /** @var int */
    private $amount = null;

    /** @var string USD|JPY|TWD|THB */
    private $currency = null;

    /** @var string */
    private $order_id = null;

    /** @var bool */
    private $capture = true;

    /**
     * PreapprovedPayPayment constructor.
     *
     * @param LINEPay $linepay
     * @param string $reg_key
     * @param string $product_name
     * @param int $amount
     * @param string $currency
     * @param string $order_id
     * @param bool $capture
     */
    public function __construct(
        $linepay,
        $reg_key,
        $product_name,
        $amount,
        $currency,
        $order_id,
        $capture
    ) {
        $this->linepay      = $linepay;
        $this->reg_key      = $reg_key;
        $this->product_name = $product_name;
        $this->amount       = $amount;
        $this->currency     = $currency;
        $this->order_id     = $order_id;
        $this->capture      = $capture;
    }

    /**
     * @return string
     */
    public function requestMethod()
    {
        return 'POST';
    }

    /**
     * @return string
     */
    public function requestUrl()
    {
        return $this->linepay->getEndPoint()->getPreapprovedPayPaymentUrl($this->reg_key);
    }

    /**
     * @return array
     */
    public function requestOptions()
    {
        $params = [
            'productName' => $this->product_name,
            'amount'      => $this->amount,
            'currency'    => $this->currency,
            'orderId'     => $this->order_id
        ];

        if ($this->capture !== null) {
            $params += ['capture' => $this->capture ? 'true' : 'false'];
        }

        return [
            'json' => $params
        ];
    }

    /**
     * @param \stdClass $responseObject
     *
     * @return ResultInterface
     */
    public function buildResult($responseObject)
    {
        $builder = new PreapprovedPayPaymentResultBuilder();
        $result  = $builder
            ->setApiResult($responseObject)
            ->build();

        return $result;
    }
}