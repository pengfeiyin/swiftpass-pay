<?php
/**
 * Created by PhpStorm.
 * User: pro4
 * Date: 2017/3/30
 * Time: 14:16
 */

namespace SwiftPass\Library;


class Utils
{
    static public function partner_array2xml($arr, $level = 1) {	//大数组转XML，木有XML标签
        $s = $level == 1 ? "" : '';
        foreach ($arr as $tagname => $value) {
            if (is_numeric($tagname)) {
                $tagname = $value['TagName'];
                unset($value['TagName']);
            }
            if (!is_array($value)) {
                $s .= "<{$tagname}>" . (!is_numeric($value) ? '<![CDATA[' : '') . $value . (!is_numeric($value) ? ']]>' : '') . "</{$tagname}>";
            }else{
                $s .= "<{$tagname}>" . self::partner_array2xml($value, $level + 1) . "</{$tagname}>";
            }
        }
        $s = preg_replace("/([\x01-\x08\x0b-\x0c\x0e-\x1f])+/", ' ', $s);
        return $level == 1 ? $s . "" : $s;
    }

    static public function partner_signing($value,$mch_key){	//银行进件接口签名
        ksort($value, SORT_STRING);	//数组字典序
        $split_joint = '';
        foreach ($value as $key => $v){	//拼接
            if(empty($v)){
                continue;
            }
            $split_joint .= "{$key}={$v}&";
        }
        $split_joint_n = substr($split_joint, 0, -1);	//把最后的符号干掉
        $split_joint_n .= "{$mch_key}";	//拼接密钥
        return md5($split_joint_n);	//MD5
    }

    static public function xmlToArray($xml){
        libxml_disable_entity_loader(true);
        $xmlstring = simplexml_load_string($xml, 'SimpleXMLElement', LIBXML_NOCDATA);
        $val = json_decode(json_encode($xmlstring),true);
        return $val;
    }

    public static function randomString($type = 'alnum', $len = 8) {
        switch ($type) {
            case 'ALL':
                $chars = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789-@#~';
                break;
            case 'CHAR':
                $chars = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz-@#~';
                break;
            case 'CHAR-':
                $chars = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789-';
                break;
            case 'NUMBER+':
                $chars = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
                break;
            case 'NUMBER':
                $chars = '0123456789';
                break;
            default :
                $chars = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789-@#~';
                break;
        }
        mt_srand((int)microtime() * 1000000 * getmypid());
        $password = "";
        while (strlen($password) < $len)
            $password .= substr($chars, (mt_rand() % strlen($chars)), 1);

        return $password;
    }
}