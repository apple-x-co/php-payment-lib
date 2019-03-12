<?php
/**
 * Created by PhpStorm.
 * User: sanokouhei
 * Date: 2019-03-07
 * Time: 10:47
 */

namespace Payment\LINEPay\Reservation;


use Payment\LINEPay;
use Payment\LINEPay\Reservation;

class ReservationBuilder implements LINEPay\APIBuilderInterface
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
    private $confirm_url_type = 'CLIENT';

    /** @var bool */
    private $check_confirm_url_browser = false;

    /** @var string */
    private $cancel_url = null;

    /** @var string */
    private $package_name = null;

    /** @var string */
    private $order_id = null;

    /** @var string */
    private $delivery_place_phone = null;

    /** @var string */
    private $pay_type = 'NORMAL';

    /** @var string */
    private $lang_cd = null;

    /** @var bool */
    private $capture = true;

    /**
     * ReservationBuilder constructor.
     */
    public function __construct()
    {
    }

    /**
     * @param LINEPay $linepay
     *
     * @return $this
     */
    public function setLinepay($linepay)
    {
        $this->linepay = $linepay;

        return $this;
    }

    /**
     * @param string $product_name
     *
     * @return $this
     */
    public function setProductName($product_name)
    {
        $this->product_name = $product_name;

        return $this;
    }

    /**
     * @param int $amount
     *
     * @return $this
     */
    public function setAmount($amount)
    {
        $this->amount = $amount;

        return $this;
    }

    /**
     * @param string $currency
     *
     * @return $this
     */
    public function setCurrency($currency)
    {
        $this->currency = $currency;

        return $this;
    }

    /**
     * @param string $confirm_url
     *
     * @return $this
     */
    public function setConfirmUrl($confirm_url)
    {
        $this->confirm_url = $confirm_url;

        return $this;
    }

    /**
     * @param string $order_id
     *
     * @return $this
     */
    public function setOrderId($order_id)
    {
        $this->order_id = $order_id;

        return $this;
    }

    /**
     * @param string $product_image_url
     *
     * @return $this
     */
    public function setProductImageUrl($product_image_url)
    {
        $this->product_image_url = $product_image_url;

        return $this;
    }

    /**
     * @param string $mid
     *
     * @return $this
     */
    public function setMid($mid)
    {
        $this->mid = $mid;

        return $this;
    }

    /**
     * @param string $one_time_key
     *
     * @return $this
     */
    public function setOneTimeKey($one_time_key)
    {
        $this->one_time_key = $one_time_key;

        return $this;
    }

    /**
     * @param string $confirm_url_type
     *
     * @return $this
     */
    public function setConfirmUrlType($confirm_url_type)
    {
        $this->confirm_url_type = $confirm_url_type;

        return $this;
    }

    /**
     * @param bool $check_confirm_url_browser
     *
     * @return $this
     */
    public function setCheckConfirmUrlBrowser($check_confirm_url_browser)
    {
        $this->check_confirm_url_browser = $check_confirm_url_browser;

        return $this;
    }

    /**
     * @param string $cancel_url
     *
     * @return $this
     */
    public function setCancelUrl($cancel_url)
    {
        $this->cancel_url = $cancel_url;

        return $this;
    }

    /**
     * @param string $package_name
     *
     * @return $this
     */
    public function setPackageName($package_name)
    {
        $this->package_name = $package_name;

        return $this;
    }

    /**
     * @param string $delivery_place_phone
     *
     * @return $this
     */
    public function setDeliveryPlacePhone($delivery_place_phone)
    {
        $this->delivery_place_phone = $delivery_place_phone;

        return $this;
    }

    /**
     * @param string $pay_type
     *
     * @return $this
     */
    public function setPayType($pay_type)
    {
        $this->pay_type = $pay_type;

        return $this;
    }

    /**
     * @param string $lang_cd
     *
     * @return $this
     */
    public function setLangCd($lang_cd)
    {
        $this->lang_cd = $lang_cd;

        return $this;
    }

    /**
     * @param bool $capture
     *
     * @return $this
     */
    public function setCapture($capture)
    {
        $this->capture = $capture;

        return $this;
    }

    /**
     * @return Reservation
     */
    public function build()
    {
        return new Reservation(
            $this->linepay,
            $this->product_name,
            $this->product_image_url,
            $this->amount,
            $this->currency,
            $this->mid,
            $this->one_time_key,
            $this->confirm_url,
            $this->confirm_url_type,
            $this->check_confirm_url_browser,
            $this->cancel_url,
            $this->package_name,
            $this->order_id,
            $this->delivery_place_phone,
            $this->pay_type,
            $this->lang_cd,
            $this->capture
        );
    }
}