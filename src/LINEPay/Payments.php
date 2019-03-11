<?php
/**
 * Created by PhpStorm.
 * User: sanokouhei
 * Date: 2019-03-07
 * Time: 10:47
 */

namespace Payment\LINEPay;


use Payment\LINEPay;
use Payment\LINEPay\Payments\PaymentsResultBuilder;
use Payment\ResultInterface;

class Payments implements APIInterface
{
    /** @var LINEPay */
    private $linepay = null;

    /** @var string[] */
    private $transaction_ids;

    /** @var string[] */
    private $order_ids;

    /**
     * Payments constructor.
     *
     * @param LINEPay $linepay
     * @param string[] $transaction_ids
     * @param string[] $order_ids
     */
    public function __construct($linepay, $transaction_ids, $order_ids)
    {
        $this->linepay         = $linepay;
        $this->transaction_ids = $transaction_ids;
        $this->order_ids       = $order_ids;
    }

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
        $query_string = http_build_query([
            'transactionId' => $this->transaction_ids,
            'orderId'       => $this->order_ids
        ]);

        return $this->linepay->getEndPoint()->getPaymentsUrl() . '?' . $query_string;
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
        $builder = new PaymentsResultBuilder();
        $result  = $builder
            ->setApiResult($responseObject)
            ->build();

        return $result;
    }
}