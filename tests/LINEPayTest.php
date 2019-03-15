<?php
/**
 * Created by PhpStorm.
 * User: sanokouhei
 * Date: 2019-03-12
 * Time: 08:47
 */

namespace Tests\Payment;

use Payment\LINEPay;
use Payment\ResultInterface;
use PHPUnit\Framework\TestCase;
use Tests\Payment\LINEPay\MockAPI;

class LINEPayTest extends TestCase
{
    private function getLINEPay()
    {
        static $linepay = null;

        if ($linepay === null) {
            $linepay = new LINEPay(
                getenv('LINEPAY_CHANNEL_ID'),
                getenv('LINEPAY_CHANNEL_SECRET'),
                getenv('LINEPAY_CHANNEL_ENV')
            );
        }

        return $linepay;
    }

    public function testEndPoint()
    {
        $linepay = $this->getLINEPay();

        $this->assertInstanceOf(LINEPay\EndPoint::class, $linepay->getEndPoint());
    }

    public function testRequest()
    {
        $linepay = $this->getLINEPay();

        $responseObject = $linepay->request(new MockAPI());

        $this->assertInstanceOf(ResultInterface::class, $responseObject);
    }
}