# swiftpass-pay
威富通支付SDK  
# 版本1.0.0
包含如下接口：

* 商户进件接口
* js原生态支付接口

## Feature
* 命名空间规范
* 隐藏开发者不需要关注的细节（签名，xml序列化）
* 开发者只需要知道用数组传递什么参数即可

## Requirement

* composer
* rmccue/requests
* particle/validator
* php >= 5.5.9

## Installation
```
 composer require mztli/swiftpass-pay
```

## Usag
基本使用（js原生态支付示例）
```php
use SwiftPass\Pay\RawWebPay;
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
var_dump($res); //预支付订单数据
```


## 特别提示：  
* 在使用本SDK前请熟读“威富通”支付的相关文档及微信支付相关文档
* 本SDK是隐藏了实现细节，以助开发者将更多经历集中在业务层面

## 写在最后
谢谢各位捧场，如果有任何为题可以给我发邮件，我会在收到邮件后第一时间给予答复
* mail : mzt.live@live.com