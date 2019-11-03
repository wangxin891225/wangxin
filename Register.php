<?php
/**
 * 注册模式 解决全局共享问题
 * 关键点：set get
 * User: songjq
 * Date: 2019/10/31
 * Time: 11:11
 */
class Register{
    static protected $objects;
    static function set($alias, $object){
        self::$objects[$alias] = $object;
    }
    static function get($alias){
        return self::$objects[$alias];
    }
    static function unset($alias){
        unset(self::$objects[$alias]);
    }
}

Register::set('conf', array('test'));
$obj = Register::get('conf');