<?php
/**
 * 单例模式 解决重复new耗费资源问题
 * 关键点：1.自行创建对象 2.防止直接创建对象、防止克隆、私有静态变量
 * User: songjq
 * Date: 2019/10/30
 * Time: 17:55
 */
class Singleton{
    private static $_instance;
    private function __construct()
    {
    }
    private function __clone(){
    }
    public static function getInstance(){
        if (!self::$_instance instanceof self) {
           self::$_instance = new self();
        }
        return self::$_instance;
    }
}
$objSingle = Singleton::getInstance();

