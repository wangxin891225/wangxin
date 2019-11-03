<?php

/**
 * 工厂模式 解决到处乱new混乱 一旦需要换类名得到处都换 麻烦 把new放到方法里
 * 关键点：抽象出接口
 * User: songjq
 * Date: 2019/10/31
 * Time: 10:05
 */
interface MysqlConn
{
    public function Conn();
}

class MysqliDemo implements MysqlConn
{
    public function Conn()
    {
        echo 'connect by Mysqli'.PHP_EOL;
    }
}

class PdoDemo implements MysqlConn
{
    public function Conn()
    {
        echo 'connect by Pdo'.PHP_EOL;
    }
}

class MysqlFactory
{
    public static function Create($className)
    {
        return new $className();
    }
}

$objMysql = MysqlFactory::Create('MysqliDemo');
$objMysql->Conn();
$objPdo = MysqlFactory::Create('PdoDemo');
$objPdo->Conn();