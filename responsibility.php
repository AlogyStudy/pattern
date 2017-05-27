<?php

header('content-type: text/html; charset=utf-8');

// 责任链模式

// 权利越大的人管理越多，越严重的问题，越得往上级找，底层的人只能管理鸡毛蒜皮的小事。
// 每个人都有处理事情的，权利范围.

class borad {
  public $power = 1; // 处理范围的权限
  protected $top = 'admin'; // 上级的范围

  public function process($lev) {
    if ($lev <= $this->power) {
      echo '删除';
    } else {
      $top = new $this->top;
      $top->process($lev);
    }
  }
}

class admin {
  public $power = 2;
  protected $top = 'police';
  public function process($lev) {
    if ($lev <= $this->power) {
      echo '封闭';
    } else {
      $top = new $this->top;
      $top->process($lev);
    }
  }
}

class police {
  protected $power;
  protected $top = null;
  public function process() {
    echo '抓!~';
  }
}

$lev = 1;

$judge = new borad(); // 距离最近的一级
$judge->process($lev);

