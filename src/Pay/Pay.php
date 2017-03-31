<?php
/**
 * Created by PhpStorm.
 * User: pro4
 * Date: 2017/3/30
 * Time: 17:07
 */

namespace SwiftPass\Pay;


use SwiftPass\Library\Utils;
use SwiftPass\Library\Xml;

abstract  class Pay
{
    protected $Url = 'https://pay.swiftpass.cn/pay/gateway ';

    /** 预支付订单
     * @param $playLoad
     * @return mixed
     */
    abstract  public function Pay($playLoad);

    /**支付回调处理
     * @param $notifyXml
     * @return mixed
     */
    abstract  public function Notify($notifyXml);

    protected function DataSerialization($postData){
        $obj = new Xml();
        $data = $obj->ArrayToXml($postData);
        return $data;
    }

    protected function DataDeserialization($response){
        $data = Utils::xmlToArray($response);
        return $data;
    }
}