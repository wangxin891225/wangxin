<?php

/**
 * 迭代器模式 更细粒度操作数组
 * 关键点：抽象出接口
 * User: songjq
 * Date: 2019/11/1
 * Time: 13:00
 */
class MyIterator implements Iterator
{
    private $position = 0;
    private $arr = [];

    public function __construct($array)
    {
        $this->arr      = $array;
        $this->position = 0;
    }

    function rewind()
    {
        $this->position = 0;
    }

    function current()
    {
        return $this->arr[$this->position];
    }

    function key()
    {
        return $this->position;
    }

    function next()
    {
        ++$this->position;
    }

    function valid()
    {
        return isset($this->arr[$this->position]);
    }
}

class MyAggregate implements IteratorAggregate
{
    public $property;

    public function addProperty($property)
    {
        $this->property[] = $property;
    }

    public function getIterator()
    {
        return new MyIterator($this->property);
    }
}

class Client
{
    public static function test(){
        $obj = new MyAggregate();
        $obj->addProperty('demo1');
        $obj->addProperty('demo2');
        $iterator = $obj->getIterator();
        while($iterator->valid()){
            $key = $iterator->key();
            $value = $iterator->current();
            echo '键名：'.$key.' 键值：'.$value.PHP_EOL;
            $iterator->next();
        }
    }
}
Client::test();

