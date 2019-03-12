<?php
/**
 * Created by PhpStorm.
 * User: sanokouhei
 * Date: 2019-03-11
 * Time: 15:00
 */

namespace Payment\LINEPay;


use Payment\LINEPay;
use Payment\LINEPay\Authorizations\AuthorizationsResultBuilder;
use Payment\ResultInterface;

class Authorizations implements APIInterface
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

        return $this->linepay->getEndPoint()->getAuthorizationsUrl() . '?' . $query_string;
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
        $builder = new AuthorizationsResultBuilder();
        $result  = $builder
            ->setApiResult($responseObject)
            ->build();

        return $result;
    }
}