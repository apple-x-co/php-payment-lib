<?php
/**
 * Created by PhpStorm.
 * User: sanokouhei
 * Date: 2019-03-07
 * Time: 11:36
 */

namespace Payment\LINEPay\Void;


use Payment\ResultFailureInterface;
use Payment\ResultInterface;

class VoidFailure implements ResultInterface, ResultFailureInterface
{
    /** @var string */
    private $code;

    /** @var string */
    private $reason;

    /**
     * @return bool
     */
    public function isSuccess()
    {
        return false;
    }

    /**
     * @param string $code
     *
     * @return $this
     */
    public function setFailureCode($code)
    {
        $this->code = $code;

        return $this;
    }

    /**
     * @return string
     */
    public function getFailureCode()
    {
        return $this->code;
    }

    /**
     * @param string $reason
     *
     * @return $this
     */
    public function setFailureReason($reason)
    {
        $this->reason = $reason;

        return $this;
    }

    /**
     * @return string
     */
    public function getFailureReason()
    {
        return $this->reason;
    }
}