<?php
/**
 * Created by PhpStorm.
 * User: pro4
 * Date: 2017/3/30
 * Time: 19:01
 */

namespace SwiftPass\Library;


class Xml
{
    protected $XmlWrite;
    public function __construct()
    {
        $this->XmlWrite = new \XMLWriter();
    }
    public function ArrayToXml($Array,$IsArray=false){
        if(!$IsArray){
            $this->XmlWrite->openMemory();
            $this->XmlWrite->startElement('xml');
        }
        foreach($Array as $key => $value){
            if(is_array($value)){
                $this->XmlWrite->startElement($key);
                $this->ArrayToXml($value, TRUE);
                $this->XmlWrite->endElement();
                continue;
            }
            if(is_string($value)){
                $this->XmlWrite->startElement($key);
                $this->XmlWrite->writeCdata($value);
                $this->XmlWrite->endElement();
                continue;
            }
            $this->XmlWrite->writeElement($key, $value);
        }
        if(!$IsArray) {
            $this->XmlWrite->endElement();
            return $this->XmlWrite->outputMemory(true);
        }
    }
    public function XmlToArray($XmlStr){
        if(empty($XmlStr))
            throw new \InvalidArgumentException('要转换的Xml字符串不存在');
        $XmlObj = simplexml_load_string($XmlStr);
        $Array = $this->ToArray($XmlObj);
        return $Array;
    }
    protected function ToArray($XmlObj){
        $Array = [];
        foreach ($XmlObj as $Key =>$Value){
            if(!empty($Value->children())){
                $Value = $this->ToArray($Value);
                $Array[$Key] = (array)$Value;
                continue;
            }
            $Array[$Key] = (string)$Value;
        }
        return $Array;
    }
    public function XmlToString(){
        //Todo：待实现
    }
    public function JsonToXml(){
        //Todo：待实现
    }
    public function XmlToJson(){
        //Todo：待实现
    }
}