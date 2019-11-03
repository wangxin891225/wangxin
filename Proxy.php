<?php

/**
 * 代理模式 通过代理访问真实对象
 * 关键点：
 * User: songjq
 * Date: 2019/11/1
 * Time: 11:45
 */
interface Person
{
    public function Say();
}

class RealPerson implements Person
{
    public function Say()
    {
        echo 'Hello World!';
    }
}

class Proxy implements Person
{
    public $objReal;

    function __construct($RealPerson)
    {
        if (empty($objReal)) {
            $this->objReal = new RealPerson();
        } else {
            $this->objReal = $RealPerson;
        }
    }

    function Say()
    {
        $this->objReal->Say();
    }
}

$objPerson = new RealPerson();
$obj       = new Proxy($objPerson);
$obj->Say();