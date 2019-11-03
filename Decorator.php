<?php
/**
 * 装饰器模式 可以随心所欲给对象加属性
 * User: songjq
 * Date: 2019/11/1
 * Time: 09:50
 */
interface Decorator{
    public function add($content);
}

class EditorAdd implements Decorator {
    public $Content;
    public function add($content){
        return '#编辑审核通过#';
    }
}

class MarketAdd implements Decorator {
    public $Content;
    public function add($content){
        return '#市场审核通过#';
    }
}

class Article{
    public $Content='#基本数据#';
    public $Decorators;
    public function addDecorator($Object){
        $this->Decorators[] = $Object;
    }
    public function Property(){
        foreach($this->Decorators as $decorator){
            $this->Content .= $decorator->add($this->Content);
        }
    }
}

$obj = new Article();
$obj->addDecorator(new EditorAdd());
$obj->addDecorator(new MarketAdd());
$obj->Property();
echo $obj->Content;
