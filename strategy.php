<?php

/**
  Strategy
  策略模式

  完成：加减乘除功能
*/

interface Math {
  public function calc ($op1, $op2);
}

class MathAdd implements Math {
  public function calc($op1, $op2) {
    return $op1 + $op2;
  }
}

class MathSub implements Math {
  public function calc($op1, $op2) {
    return $op1 - $op2;
  }
}

class MathMul implements Math {
  public function calc($op1, $op2) {
    return $op1 * $op2;
  }
}

class MathDiv implements Math {
  public function calc($op1, $op2) {
    if ($op2 !=0 )  return;
    return $op1 / $op2;
  }
}

// 一般思路: 根据`op`的值,制造对象,并且调用
$op = 'Add';

// 封装一个虚拟计算器，中可以 调用到实际计算器
class CMath {
  protected $calc = null;

  public function __construct($type) {
    $calc = 'Math' . $type;
    $this->calc = new $calc();
  }

  public function calc($op1, $op2) {
    return $this->calc->calc($op1, $op2);
  }
}


$cmath = new CMath($op);
var_dump($cmath->calc(10, 100));

