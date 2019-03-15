<?php
/**
 * Created by PhpStorm.
 * User: sanokouhei
 * Date: 2019-03-07
 * Time: 11:36
 */

namespace Payment;


interface ResultFailureInterface
{
    /**
     * @param string $code
     *
     * @return $this
     */
    public function setFailureCode($code);

    /**
     * @return string
     */
    public function getFailureCode();

    /**
     * @param string $reason
     *
     * @return $this
     */
    public function setFailureReason($reason);

    /**
     * @return string
     */
    public function getFailureReason();
}