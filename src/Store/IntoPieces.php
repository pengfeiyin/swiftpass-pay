<?php
/**
 * Created by PhpStorm.
 * User: pro4
 * Date: 2017/3/16
 * Time: 11:58
 */
namespace  SwiftPass\Store;
use Particle\Validator\Validator;
use Requests;
use SwiftPass\Library\Utils;

class IntoPieces
{
    protected $Seivces = [
        'normal_mch_add ', //普通商户进件服务
        'pic_upload' //图片上传服务
    ];

    protected $industrIds = [
        '111',
        '112',
        '113',
        '114',
        '115',
        '116',
        '117',
        '121',
        '122',
        '123',
        '124',
        '125',
        '126',
        '127',
        '131',
        '132',
        '133',
        '134',
        '135',
        '136',
        '137',
        '138',
        '139',
        '141',
        '142',
        '143',
        '144',
        '145',
        '146',
        '147',
        '148',
        '149',
        '151',
        '152',
        '153',
        '154',
        '157',
        '158',
        '159',
        '161',
        '162',
        '163',
        '164',
        '165',
        '171',
        '172',
        '173',
        '174',
        '175',
        '176',
        '177',
        '178',
        '179',
        '181',
        '182',
        '183',
        '184',
        '185',
        '186',
        '191',
        '192',
        '193',
        '194',
        '195',
        '196',
        '197',
        '198',
        '199',
        '210',
        '211',
        '212',
        '213',
        '214',
        '221',
        '222',
        '223',
        '224',
        '225',
        '241',
        '242',
        '243',
        '244',
        '245',
        '246',
        '247',
        '248',
        '249',
        '250',
        '261',
        '262',
        '263',
        '264',
        '265',
        '266',
        '267',
        '268',
        '269',
        '270',
        '272',
        '273',
        '281',
        '282',
        '291',
        '292',
        '301',
        '302',
        '303',
        '304',
        '305',
        '306',
        '307',
        '308',
        '309',
        '311',
        '312',
        '313',
        '314',
        '315',
        '316',
        '317',
        '318',
        '319',
        '321',
        '322',
        '323',
        '324',
        '325',
        '326',
        '327',
        '328',
        '329',
        '331',
        '332',
        '333',
        '341',
        '342',
        '343',
        '344',
        '345',
        '346',
        '351',
        '352',
        '353',
        '354',
        '355',
        '356',
        '357',
        '358',
        '359',
        '361',
        '362',
        '363',
        '364',
        '365',
        '366',
        '367',
        '368',
        '369',
        '371',
        '372',
        '373',
        '374',
        '375',
        '376',
        '377',
        '378',
        '379',
        '381',
        '382',
        '383',
        '384',
        '385',
        '391',
        '392',
        '393',
        '394',
        '395',
        '396',
        '397',
        '398',
        '399',
        '401',
        '402',
        '403',
        '404',
        '405',
        '406',
        '407',
        '408',
        '409',
        '410',
        '411',
        '412',
        '413',
        '421',
        '422',
        '423',
        '424',
        '425',
        '431',
        '432',
        '433',
        '434',
        '435',
        '436',
        '437',
        '438',
        '439',
        '470',
        '471',
        '472',
        '473',
        '474',
        '475',
        '476',
        '477',
        '478',
        '479',
        '486',
        '487',
        '488',
        '489',
        '491',
        '492',
        '493',
        '494',
        '495',
        '496',
        '497',
        '498',
        '499'
    ];
    protected $provinces = [
        '310000',
        '020000',
        '170000',
        '030000',
        '280000',
        '140000',
        '080000',
        '090000',
        '200000',
        '260000',
        '150000',
        '290000',
        '060000',
        '050000',
        '040000',
        '130000',
        '270000',
        '160000',
        '300000',
        '220000',
        '110000',
        '210000',
        '010000',
        '190000',
        '100000',
        '240000',
        '120000',
        '180000',
        '230000',
        '250000',
        '330000',
        '070000',
    ];
    protected $citys = [
        '040700',
        '335200',
        '120100',
        '040100',
        '040900',
        '180400',
        '181100',
        '180200',
        '181000',
        '040300',
        '040500',
        '121500',
        '041100',
        '070600',
        '070700',
        '070500',
        '150700',
        '020200',
        '090900',
        '070900',
        '070100',
        '070800',
        '041000',
        '070400',
        '070200',
        '151500',
        '151300',
        '070300',
        '151000',
        '281300',
        '280900',
        '281400',
        '280600',
        '280200',
        '280400',
        '281200',
        '260300',
        '281000',
        '280100',
        '281100',
        '251600',
        '251500',
        '250400',
        '110100',
        '251200',
        '250300',
        '280700',
        '280500',
        '280800',
        '250100',
        '280300',
        '260500',
        '160800',
        '161600',
        '160600',
        '161500',
        '161200',
        '161300',
        '180100',
        '180900',
        '181300',
        '160700',
        '180500',
        '270500',
        '270300',
        '260400',
        '260200',
        '260100',
        '271000',
        '270100',
        '270400',
        '270200',
        '270900',
        '270800',
        '290200',
        '290700',
        '290500',
        '050500',
        '050700',
        '290800',
        '290100',
        '201200',
        '290300',
        '290600',
        '290400',
        '050100',
        '050800',
        '050200',
        '060500',
        '050900',
        '051100',
        '050300',
        '050400',
        '051200',
        '051000',
        '050600',
        '200800',
        '180800',
        '180300',
        '181200',
        '200500',
        '180600',
        '181400',
        '040800',
        '040400',
        '040600',
        '180700',
        '040200',
        '201100',
        '200900',
        '201300',
        '200100',
        '200700',
        '200400',
        '200300',
        '201000',
        '200200',
        '200600',
        '201400',
        '080800',
        '080600',
        '081100',
        '080400',
        '081300',
        '080300',
        '150200',
        '150100',
        '150300',
        '080900',
        '080500',
        '120600',
        '120300',
        '121300',
        '121400',
        '121000',
        '121700',
        '080100',
        '081200',
        '080700',
        '081000',
        '080200',
        '150900',
        '060100',
        '060700',
        '060300',
        '061000',
        '060600',
        '060400',
        '061200',
        '061100',
        '061300',
        '060800',
        '060900',
        '150600',
        '151600',
        '150500',
        '151700',
        '150400',
        '151100',
        '061400',
        '060200',
        '151400',
        '151200',
        '150800',
        '110900',
        '190900',
        '190100',
        '191400',
        '190500',
        '190200',
        '130100',
        '130500',
        '130900',
        '130300',
        '130200',
        '130700',
        '170700',
        '170100',
        '170200',
        '171800',
        '170400',
        '171700',
        '191300',
        '190600',
        '171300',
        '170500',
        '171000',
        '130600',
        '161400',
        '160200',
        '161100',
        '030600',
        '160500',
        '160900',
        '160400',
        '160100',
        '161000',
        '160300',
        '161800',
        '210200',
        '222200',
        '210100',
        '130400',
        '130800',
        '030200',
        '030700',
        '031100',
        '030100',
        '030800',
        '030500',
        '170900',
        '191000',
        '191800',
        '191700',
        '191900',
        '190400',
        '190700',
        '240200',
        '240300',
        '240400',
        '192000',
        '240100',
        '030400',
        '191200',
        '030300',
        '030900',
        '031000',
        '190800',
        '191500',
        '192100',
        '190300',
        '191100',
        '191600',
        '240600',
        '140400',
        '171500',
        '140300',
        '140700',
        '140100',
        '171200',
        '171600',
        '170300',
        '171100',
        '170600',
        '170800',
        '240700',
        '140600',
        '240900',
        '240500',
        '240800',
        '141100',
        '141000',
        '140800',
        '140900',
        '140500',
        '140200',
        '300300',
        '300500',
        '300400',
        '251300',
        '010100',
        '300200',
        '230200',
        '231200',
        '230400',
        '300100',
        '230300',
        '250800',
        '250600',
        '250900',
        '270600',
        '270700',
        '250200',
        '250500',
        '251100',
        '251400',
        '250700',
        '251000',
        '231600',
        '110700',
        '110200',
        '110400',
        '100800',
        '101100',
        '110500',
        '111000',
        '111100',
        '110300',
        '110800',
        '110600',
        '231900',
        '231100',
        '230600',
        '232000',
        '231000',
        '231500',
        '231800',
        '101300',
        '230900',
        '231300',
        '230500',
        '311800',
        '100500',
        '100700',
        '100900',
        '100100',
        '101000',
        '100300',
        '121600',
        '120500',
        '120400',
        '120900',
        '120700',
        '231400',
        '230800',
        '231700',
        '161700',
        '232100',
        '230700',
        '100400',
        '100200',
        '101200',
        '230100',
        '100600',
        '120800',
        '310800',
        '311100',
        '311900',
        '310300',
        '311600',
        '311000',
        '311700',
        '311300',
        '310700',
        '310900',
        '310100',
        '260700',
        '260600',
        '120200',
        '121100',
        '121200',
        '310400',
        '310200',
        '310500',
        '311400',
        '310600',
        '311200'
    ];
    protected $bankIds = [
        1,
        2,
        3,
        4,
        5,
        6,
        7,
        8,
        9,
        10,
        11,
        12,
        13,
        14,
        15,
        41,
        42,
        43,
        44,
        45,
        46,
        47,
        48,
        49,
        61,
        62,
        81,
        101,
        102,
        121,
        122,
        123,
        124,
        125,
        141,
        142,
        161,
        162,
        163,
        181,
        182,
        183,
        201,
        221,
        241,
        261,
        262,
        281,
        301,
        321,
        341,
        361,
        381,
        382,
        383,
        401,
        402,
        403,
        421,
        422,
        441,
        442,
        443,
        461,
        481,
        501,
        502,
        503,
        504,
        505,
        506,
        507,
        508,
        521,
        522,
        523,
        524,
        525,
        526,
        527,
        528,
        529,
        530,
        531,
        533,
        534,
        535,
        536,
        561,
        581,
        601,
        621,
        641,
        10000001,
        10000002,
        10000006,
        10000007,
        10000011,
        10000016,
        10000021,
        10000026,
        10000027,
    ];

    private $partner;
    private $serviceName ;
    private $dataType;
    private $charset;
    private $security_key;

    const URL = 'http://35api.test.swiftpass.cn/sppay-interface-war/gateway';

    public function __construct($partner,$security_key,$dataType = 'json',$charset = 'UTF-8')
    {
        $this->partner = $partner;
        $this->dataType = $dataType;
        $this->charset = $charset;
        $this->security_key = $security_key;
    }

    /** 进件接口实现
     * @param $metaData
     * @throws \Exception
     */
    public  function  NormalMchAdd($metaData){
        $v = new Validator();
        $v->required('merchant.merchantName')->string()->lengthBetween(1,64);
        $v->required('merchant.outMerchantId')->string()->lengthBetween(1,64);
        $v->required('merchant.feeType')->string()->inArray(['CNY','USD','EUR','HKD']);
        $v->required('merchant.mchDealType')->integer()->between(1,2);
        $v->optional('merchant.remark')->string()->lengthBetween(1,128);
        $v->required('merchant.chPayAuth')->string()->between(0,1);
        $v->required('merchant.merchantDetail.merchantShortName')->string()->lengthBetween(1,64);
        $v->required('merchant.merchantDetail.industrId')->integer()->inArray($this->industrIds);
        $v->required('merchant.merchantDetail.province')->string()->lengthBetween(1,16)->inArray($this->provinces);
        $v->required('merchant.merchantDetail.city')->string()->lengthBetween(1,16)->inArray($this->citys);
        $v->required('merchant.merchantDetail.address')->string()->lengthBetween(1,128);
        $v->required('merchant.merchantDetail.tel')->string()->regex("/^(1(([35][0-9])|(47)|[8][0126789]))\d{8}$/");
        $v->required('merchant.merchantDetail.email')->string()->email();
        $v->required('merchant.merchantDetail.legalPerson')->string()->lengthBetween(1,64);
        $v->required('merchant.merchantDetail.customerPhone')->string()->regex("/^(1(([35][0-9])|(47)|[8][0126789]))\d{8}$/");
        $v->required('merchant.merchantDetail.principal')->string()->lengthBetween(1,32);
        $v->required('merchant.merchantDetail.principalMobile')->string()->regex("/^(1(([35][0-9])|(47)|[8][0126789]))\d{8}$/");
        $v->required('merchant.merchantDetail.idCode')->string()->lengthBetween(1,128);
        //todo: 以下4个参数要调用图片上传接口把图片上传到服务器后再填入
        $v->required('merchant.merchantDetail.indentityPhoto')->string()->lengthBetween(1,265);
        $v->optional('merchant.merchantDetail.licensePhoto')->string()->lengthBetween(1,265);
        $v->optional('merchant.merchantDetail.protocolPhoto')->string()->lengthBetween(1,265);
        $v->optional('merchant.merchantDetail.orgPhoto')->string()->lengthBetween(1,265);
        $v->required('merchant.bankAccount.accountCode')->string();
        $v->required('merchant.bankAccount.bankId')->integer()->inArray($this->bankIds);
        $v->required('merchant.bankAccount.accountName')->string();
        $v->required('merchant.bankAccount.accountType')->integer()->between(1,2);
        $v->required('merchant.bankAccount.contactLine')->string()->lengthBetween(1,64);
        $v->required('merchant.bankAccount.bankName')->string()->lengthBetween(1,32);
        $v->required('merchant.bankAccount.province')->string()->inArray($this->provinces);
        $v->required('merchant.bankAccount.city')->string()->inArray($this->citys);
        $v->required('merchant.bankAccount.idCardType')->integer()->between(1,2);
        $v->required('merchant.bankAccount.idCard')->string()->lengthBetween(1,64);
        $v->optional('merchant.bankAccount.address')->string();
        $v->optional('merchant.bankAccount.tel')->string()->regex("/^(1(([35][0-9])|(47)|[8][0126789]))\d{8}$/");
        $response = $v->validate($metaData);
        if(!$response->isValid()){
            throw new \Exception(json_encode($response->getMessages()));
        }

        $this->serviceName = 'normal_mch_add';
        $data = $this->DataSerialization($metaData);
        $postData = $this->GetPostData($data);
        $response =  $this->Submit($postData);
        return $this->DataDeserialization($response);
    }

    /** 上传图片接口实现
     * @param int $picType
     * @param $picFile
     * @return bool|mixed
     */
    public function UploadPic($picType = 1,$picFile){
        $this->serviceName = 'pic_upload';
        $metaData = array();
        $metaData['picUpload']['picType'] = $picType;
        $data = $this->DataSerialization($metaData);
        $postData = $this->GetPostData($data);
        if(class_exists('\CURLFile')){
            $postData['picFile'] = new \CURLFile($picFile);
        }else{
            $postData['picFile'] = '@'.$picFile;
        }

        $response = $this->partner_calls(self::URL,$postData);
        return $this->DataDeserialization($response);
    }

    /** 发送请求到接口
     * @param $data
     * @return string
     * @throws \HttpException
     */
    protected function Submit($data){
        $response = Requests::post(self::URL,[
            'Content-Type'=>'application/x-www-form-urlencoded;charset=UTF-8'
        ],$data);
        if(!$response->success)
            throw  new \HttpException('http request error');
        return $response->body;
    }

    /** 组装最终的请求data（已经做了sign签名）
     * @param $data
     * @return array
     * @throws \Exception
     */
    protected function GetPostData($data){
        $v = new Validator();
        $v->required('serviceName')->string();
        $v->required('partner')->string();
        $v->required('dataType')->string()->inArray(['json','xml']);
        $v->required('charset')->string();
        $v->required('data')->string();
        $metaData = [
            'partner' => $this->partner,
            'serviceName' => $this->serviceName,
            'dataType' => $this->dataType,
            'charset' => $this->charset,
            'data' => $data
        ];

        $valid = $v->validate($metaData);
        if(!$valid->isValid()){
            throw  new \Exception(json_encode($valid->getMessages()));
        }
        $sign = Utils::partner_signing($metaData,$this->security_key);
        $metaData['dataSign'] = $sign;
        return $metaData;
    }

    /** 根据不同的dataType 转换要发送的的格式（xml or json）
     * @param $postData
     * @return mixed|string
     */
    private function DataSerialization($postData){
        if($this->dataType == 'json'){
            $data = json_encode($postData,JSON_UNESCAPED_UNICODE);
        }else{
            $data = Utils::partner_array2xml($postData, $level = 1);
        }
        return $data;
    }


    private function DataDeserialization($response){
        if($this->dataType == 'json'){
            $data = json_decode($response,true);
        }else{
            $data = Utils::xmlToArray($response);
        }
        return $data;
    }

    /** 图片上传接口使用的request方法
     * @param $urls
     * @param $datas
     * @return bool|mixed
     */
    private function partner_calls($urls,$datas){	//curl
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_TIMEOUT, 200);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER,false);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST,false);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER,true);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_URL, $urls);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $datas);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-type'=>'multipart/form-data',));
        $res = curl_exec($ch);
        if ($res == NULL) {
            curl_close($ch);
            return false;
        }
        curl_close($ch);
        return $res;
    }
}