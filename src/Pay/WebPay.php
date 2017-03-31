<?php
/**
 * Created by PhpStorm.
 * User: pro4
 * Date: 2017/3/30
 * Time: 17:25
 */

namespace SwiftPass\Pay;


abstract class WebPay extends Pay
{
    const SERVICE_NAME = 'pay.weixin.jspay';
    const VERSION = '2.0';
    const CHARSET = 'UTF-8';
    const SIGN_TYPE = 'MD5';

    protected function Sign($value,$mch_key){
        ksort($value, SORT_STRING);	//数组字典序
        $split_joint = '';
        foreach ($value as $key => $v){	//拼接
            if(empty($v)){
                continue;
            }
            $split_joint .= "{$key}={$v}&";
        }
        $split_joint_n = substr($split_joint, 0, -1);	//把最后的符号干掉
        $split_joint_n .= "&key={$mch_key}";	//拼接密钥
        return md5($split_joint_n);	//MD5
    }
}