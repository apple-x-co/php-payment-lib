<?php
/**
 * Created by PhpStorm.
 * User: sanokouhei
 * Date: 2019-03-07
 * Time: 10:47
 */

namespace Payment\LINEPay;


use Payment\LINEPay;
use Payment\LINEPay\Reservation\ReservationResultBuilder;
use Payment\LINEPay\Reservation\ReservationSuccess;
use Payment\LINEPay\Reservation\ReservationFailure;
use Payment\ResultInterface;

class Reservation implements APIInterface
{
    /** @var LINEPay */
    private $linepay = null;

    /** @var string */
    private $product_name = null;

    /** @var string */
    private $product_image_url = null;

    /** @var int */
    private $amount = null;

    /** @var string */
    private $currency = null;

    /** @var string */
    private $mid = null;

    /** @var string */
    private $one_time_key = null;

    /** @var string */
    private $confirm_url = null;

    /** @var string */
    private $confirm_url_type = null;

    /** @var bool */
    private $check_confirm_url_browser = null;

    /** @var string */
    private $cancel_url = null;

    /** @var string */
    private $package_name = null;

    /** @var string */
    private $order_id = null;

    /** @var string */
    private $delivery_place_phone = null;

    /** @var string */
    private $pay_type = null;

    /** @var string */
    private $lang_cd = null;

    /** @var bool */
    private $capture = null;

    /**
     * Reservation constructor.
     *
     * @param LINEPay $linepay
     * @param string $product_name
     * @param string $product_image_url
     * @param int $amount
     * @param string $currency
     * @param string $mid
     * @param string $one_time_key
     * @param string $confirm_url
     * @param string $confirm_url_type
     * @param bool $check_confirm_url_browser
     * @param string $cancel_url
     * @param string $package_name
     * @param string $order_id
     * @param string $delivery_place_phone
     * @param string $pay_type
     * @param string $lang_cd
     * @param bool $capture
     */
    public function __construct(
        $linepay,
        $product_name,
        $product_image_url,
        $amount,
        $currency,
        $mid,
        $one_time_key,
        $confirm_url,
        $confirm_url_type,
        $check_confirm_url_browser,
        $cancel_url,
        $package_name,
        $order_id,
        $delivery_place_phone,
        $pay_type,
        $lang_cd,
        $capture
    ) {
        $this->linepay                   = $linepay;
        $this->product_name              = $product_name;
        $this->product_image_url         = $product_image_url;
        $this->amount                    = $amount;
        $this->currency                  = $currency;
        $this->mid                       = $mid;
        $this->one_time_key              = $one_time_key;
        $this->confirm_url               = $confirm_url;
        $this->confirm_url_type          = $confirm_url_type;
        $this->check_confirm_url_browser = $check_confirm_url_browser;
        $this->cancel_url                = $cancel_url;
        $this->package_name              = $package_name;
        $this->order_id                  = $order_id;
        $this->delivery_place_phone      = $delivery_place_phone;
        $this->pay_type                  = $pay_type;
        $this->lang_cd                   = $lang_cd;
        $this->capture                   = $capture;
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
        return $this->linepay->getEndPoint()->getReserveUrl();
    }

    /**
     * @return array
     */
    public function requestOptions()
    {
        $params = [
            'productName'    => $this->product_name,
            'amount'         => $this->amount,
            'currency'       => $this->currency,
            'confirmUrl'     => $this->confirm_url,
            'orderId'        => $this->order_id
        ];

        if ($this->product_image_url !== null) {
            $params += ['productImageUrl' => $this->product_image_url];
        }
        if ($this->mid !== null) {
            $params += ['mid' => $this->mid];
        }
        if ($this->one_time_key !== null) {
            $params += ['oneTimeKey' => $this->one_time_key];
        }
        if ($this->confirm_url_type !== null &&
            ($this->confirm_url_type === 'CLIENT' || $this->confirm_url_type === 'SERVER')) {
            $params += ['confirmUrlType' => $this->confirm_url_type];
        }
        if ($this->check_confirm_url_browser !== null) {
            $params += ['checkConfirmUrlBrowser' => $this->check_confirm_url_browser ? 'true' : 'false'];
        }
        if ($this->cancel_url !== null) {
            $params += ['cancelUrl' => $this->cancel_url];
        }
        if ($this->package_name !== null) {
            $params += ['packageName' => $this->package_name];
        }
        if ($this->delivery_place_phone !== null) {
            $params += ['deliveryPlacePhone' => $this->delivery_place_phone];
        }
        if ($this->pay_type !== null &&
            ($this->pay_type === 'NORMAL' || $this->pay_type === 'PREAPPROVED')) {
            $params += ['payType' => $this->pay_type];
        }
        if ($this->lang_cd !== null) {
            $params += ['langCd' => $this->lang_cd];
        }
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
        $builder = new ReservationResultBuilder();
        $result = $builder
            ->setApiResult($responseObject)
            ->build();

        return $result;
    }
}