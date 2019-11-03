<?php
/**
 * 策略模式 与适配器模式有点像，适配器主要是为了不改变上层代码而扩展底层支持模块，策略模式是上下文设计有多个条件选择
 * 关键点：interface
 * 简单计算器代码示例
 * User: songjq
 * Date: 2019/10/31
 * Time: 15:02
 */
interface MathOp{
    public function calculate($num1, $num2);
}
class Add implements MathOp{
    public function calculate($num1, $num2){
        return $num1+$num2;
    }
}
class Sub implements MathOp{
    public function calculate($num1, $num2){
        return $num1-$num2;
    }
}
class Multi implements MathOp{
    public function calculate($num1, $num2){
        return $num1*$num2;
    }
}
class Div implements MathOp{
    public function calculate($num1, $num2){
        return $num1/$num2;
    }
}

class Operation{
    protected $action = null;
    public function __construct($type)
    {
        $this->action = $type;
    }

    public function excuation($num1, $num2){
        $obj = new $this->action;
        return $obj->calculate($num1, $num2);
    }
}

$Op = new Operation('Add');
echo $Op->excuation(8,4);
$Op = new Operation('Sub');
echo $Op->excuation(8,4);
$Op = new Operation('Multi');
echo $Op->excuation(8,4);
$Op = new Operation('Div');
echo $Op->excuation(8,4);


