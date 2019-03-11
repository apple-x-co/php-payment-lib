<?php
/**
 * Created by PhpStorm.
 * User: sanokouhei
 * Date: 2019-03-09
 * Time: 09:29
 */

namespace Payment\LINEPay;


class EndPoint
{
    /** @var string 決算内訳参照API */
    const PAYMENTS = '/v2/payments';

    /** @var string 決済予約API */
    const RESERVE = '/v2/payments/request';

    /** @var string 決済確認API */
    const CONFIRM = '/v2/payments/{transactionId}/confirm';

    /** @var string 払い戻しAPI */
    const REFUND = '/v2/payments/{transactionId}/refund';

    /** @var string オーソリ内訳参照API（未実装） */
    const AUTHORIZATIONS = '/v2/payments/authorizations';

    /** @var string チャプターAPI（未実装） */
    const CAPTURE = '/v2/payments/authorizations/{transactionId}/capture';

    /** @var string オーソリ無効処理 API（未実装） */
    const VOID = '/v2/payments/authorizations/{transactionId}/void';

    /** @var string 継続決済 API（未実装） */
    const PREAPPROVED_PAY_PAYMENT = '/v2/payments/preapprovedPay/{regKey}/payment';

    /** @var string regKey 使用可否確認API（未実装） */
    const PREAPPROVED_PAY_CHECK = '/v2/payments/preapprovedPay/{regKey}/check';

    /** @var string regKey 満了 API（未実装） */
    const PREAPPROVED_PAY_EXPIRE = '/v2/payments/preapprovedPay/{regKey}/expire';

    /** @var string */
    private $base_url;

    /**
     * EndPoint constructor.
     *
     * @param string $domain
     * @param bool $ssl
     */
    public function __construct($domain, $ssl = true)
    {
        $this->base_url = sprintf("%s://%s", $ssl ? 'https' : 'http', $domain);
    }

    /**
     * @return string
     */
    public function getPaymentsUrl()
    {
        return $this->base_url . $this::PAYMENTS;
    }

    /**
     * @return string
     */
    public function getReserveUrl()
    {
        return $this->base_url . $this::RESERVE;
    }

    /**
     * @param string $transaction_id
     *
     * @return string
     */
    public function getConfirmUrl($transaction_id)
    {
        $url = $this->base_url . $this::CONFIRM;

        return str_replace('{transactionId}', $transaction_id, $url);
    }

    /**
     * @param string $transaction_id
     *
     * @return string
     */
    public function getRefundUrl($transaction_id)
    {
        $url = $this->base_url . $this::REFUND;

        return str_replace('{transactionId}', $transaction_id, $url);
    }
}