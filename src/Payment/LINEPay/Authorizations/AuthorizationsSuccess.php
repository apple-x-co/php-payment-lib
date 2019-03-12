<?php
/**
 * Created by PhpStorm.
 * User: sanokouhei
 * Date: 2019-03-07
 * Time: 11:36
 */

namespace Payment\LINEPay\Authorizations;


use Payment\ResultInterface;

class AuthorizationsSuccess implements ResultInterface
{
    /** @var AuthorizationInfo[] */
    private $infos = [];

    /**
     * @return bool
     */
    public function isSuccess()
    {
        return true;
    }

    /**
     * @return AuthorizationInfo[]
     */
    public function getInfos()
    {
        return $this->infos;
    }

    /**
     * @param AuthorizationInfo $info
     */
    public function addInfo($info)
    {
        $this->infos[] = $info;
    }
}