<?php
/**
 * Created by PhpStorm.
 * User: pro4
 * Date: 2017/3/17
 * Time: 16:12
 */
require "../vendor/autoload.php";

use SwiftPass\Store\IntoPieces;

class IntoPiecesTest extends PHPUnit_Framework_TestCase
{

    public function testPicUploader(){
        $obj = new IntoPieces('100590006610','35aa6c203b7b4218713153f6d8dc39ec','xml');
        $response = $obj->UploadPic(1,'C:/Users/pro4/Pictures/Camera Roll/1.jpg');
        $this->assertArrayHasKey('pic',$response);
    }


    public function testNormalMchAdd(){

        $obj = new IntoPieces('100590006610','35aa6c203b7b4218713153f6d8dc39ec','xml');
        $data = array();
        $response1 = $obj->UploadPic(1,'C:/Users/pro4/Pictures/Camera Roll/1.jpg');
        $response2 = $obj->UploadPic(1,'C:/Users/pro4/Pictures/Camera Roll/1.jpg');
        $indentityPhoto = $response1['pic'].';'.$response2['pic'];
        $data['merchant'] = [
            'merchantName' => 'test',
            'outMerchantId' => '123123asd',
            'feeType' => 'CNY',
            'mchDealType' => 1,
            'chPayAuth' => '0',
            'merchantDetail' => [
                'merchantShortName' => '13123',
                'industrId' => '165',
                'province' => '190000',
                'city' => '190100',
                'address' => '天泰一路一号6楼',
                'tel' => '18613186902',
                'email' => '138019260@qq.com',
                'legalPerson' => '毛韬',
                'customerPhone' => '18613186902',
                'principal' => '毛韬',
                'principalMobile' => '18613186902',
                'idCode' => '522229199304210057',
                'indentityPhoto' =>  $indentityPhoto
            ],
            'bankAccount' => [
                'accountCode' => '6228480084036781817',
                'bankId' => 4,
                'accountName' => '毛韬',
                'accountType' => 1,
                'contactLine' => '103581006227',
                'bankName' => '广州庙头支行',
                'province' => '190000',
                'city' => '190100',
                'idCardType' => 1,
                'idCard' => '522229199304210057',
                'address' => '广州abc',
                'tel' => '18613186902'
            ]
        ];
        $response = $obj->NormalMchAdd($data);
        $this->assertArrayHasKey('isSuccess',$response);
    }
}
