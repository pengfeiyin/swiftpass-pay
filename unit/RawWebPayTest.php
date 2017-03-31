<?php
require "../vendor/autoload.php";
/**
 * Created by PhpStorm.
 * User: pro4
 * Date: 2017/3/30
 * Time: 18:40
 */
use SwiftPass\Pay\RawWebPay;
class RawWebPayTest extends PHPUnit_Framework_TestCase
{
    public function testPay(){
        $data = [
            'mch_id' => '7551000001',
            'mchKey' => '9d101c97133837e13dde2d32a5054abb',
            'out_trade_no' => '1234567asd',
            'body' => 'test',
            'total_fee' => 1,
            'mch_create_ip' => '192.168.0.1',
            'notify_url' => 'http://www.baidu.com'
        ];

        $obj = new RawWebPay(true);
        $res = $obj->Pay($data);
        $this->assertJson(json_encode($res));
    }
}