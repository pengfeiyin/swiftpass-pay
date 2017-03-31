<?php
/**
 * Created by PhpStorm.
 * User: pro4
 * Date: 2017/3/30
 * Time: 17:34
 */

namespace SwiftPass\Pay;
use Requests;
use Particle\Validator\Validator;
use SwiftPass\Exceptions\WechatException;
use SwiftPass\Library\Utils;
use SwiftPass\Library\Xml;

class RawWebPay extends WebPay
{
    protected $debug = false;
    public function __construct($debug)
    {
        $this->debug = $debug;
    }


    /**预支付订单
     * @param $playLoad array 微信支付相关参数
     * @return mixed
     * @throws \Exception
     */
    public function Pay($playLoad)
    {
        $v= new Validator();
        $v->required('mch_id')->string()->lengthBetween(1,32);
        $v->required('out_trade_no')->string()->lengthBetween(1,32);
        $v->required('body')->string()->lengthBetween(1,127);
        if($this->debug){
            $v->optional('sub_openid')->string()->lengthBetween(1,128);
        }else{
            $v->required('sub_openid')->string()->lengthBetween(1,128);
        }

        $v->optional('attach')->string()->lengthBetween(1,128);
        $v->required('total_fee')->integer();
        $v->required('mch_create_ip')->string()->lengthBetween(1,16);
        $v->required('notify_url')->string()->url()->lengthBetween(1,255);
        $v->required('mchKey')->string();

        $valid = $v->validate($playLoad);
        if(!$valid->isValid()){
            throw  new \Exception(json_encode($valid->getMessages()));
        }

        $metaData = [
            'service' => parent::SERVICE_NAME,
            'version' => parent::VERSION,
            'charset' => parent::CHARSET,
            'sign_type' => parent::SIGN_TYPE,
            'mch_id' => $playLoad['mch_id'],
            'is_raw' => 1,
            'out_trade_no' => $playLoad['out_trade_no'],
            'body' => $playLoad['body'],
            'total_fee' => $playLoad['total_fee'],
            'mch_create_ip' => $playLoad['mch_create_ip'],
            'notify_url' => $playLoad['notify_url'],
            'nonce_str' => Utils::randomString()
        ];

        if(isset($playLoad['sub_openid']))
            $metaData['sub_openid'] = $playLoad['sub_openid'];

        if(isset($playLoad['attach']))
            $metaData['attach'] = $playLoad['attach'];

        $metaData['sign'] = parent::Sign($metaData,$playLoad['mchKey']);
        $response = Requests::post($this->Url,[],parent::DataSerialization($metaData));
        return parent::DataDeserialization($response->body);

    }

    public function Notify($notifyXml)
    {
        $xmlObj = new Xml();
        $data = $xmlObj->XmlToArray($notifyXml);
        if($data['status'] > 0){
            throw new \Exception($data['message']);
        }

        if($data['result_code'] > 0){
            throw  new WechatException($data['err_msg'],$data['err_code']);
        }

        return $data;
    }
}