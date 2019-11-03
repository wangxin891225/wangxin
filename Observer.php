<?php
/**
 * 观察者模式 解决一个动作完成后需要其他同步操作
 * 关键点：
 * User: songjq
 * Date: 2019/11/1
 * Time: 09:15
 */
interface Subject{
    public function Register($observer);
    public function Notify();
}



interface Observer{
    public function Watch();
}

class Cat implements Observer{
    public function Watch()
    {
        echo 'Cat Watched';
    }
}

class Dog implements Observer{
    public function Watch()
    {
        echo 'Dog Watched';
    }
}


class Action implements Subject{
    public $_observers = [];
    public function Register($observer)
    {
        $this->_observers[] = $observer;
    }
    public function Notify()
    {
        foreach($this->_observers as $observer){
            $observer->Watch();
        }
    }
}

$act = new Action();
$act->Register(new Cat());
$act->Register(new Dog());
$act->Notify();

