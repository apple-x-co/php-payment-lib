<?php
/**
 * Created by PhpStorm.
 * User: sanokouhei
 * Date: 2019-03-12
 * Time: 08:50
 */

require_once realpath(__DIR__ . '/../vendor/autoload.php');

$dotenv = \Dotenv\Dotenv::create(__DIR__);
$dotenv->load();

$linepay = new \Payment\LINEPay(
    getenv('LINEPAY_CHANNEL_ID'),
    getenv('LINEPAY_CHANNEL_SECRET'),
    getenv('LINEPAY_CHANNEL_ENV')
);
