<?php
/**
 * 依赖注入 依赖外部类应该应该靠外部注入，这样可以解耦, 不放到__construct里 防止__construct有别的东西
 * 关键点：
 * User: songjq
 * Date: 2019/11/1
 * Time: 11:21
 */
class base{
    public function say(){
        echo 'Hello World!';
    }
}
class Action{
    public $depend;
    public function setObj($object)
    {
        $this->depend = $object;
    }
    public function do(){
        $this->depend->say();
    }
}
$objBase = new base();
$obj = new Action();
$obj->setObj($objBase);
$obj->do();
