<?php

// 适配器模式

// 服务器端代码
class tianqi {
  public static function show() {
    $today = array('tep' => 28, 'wind' => 7, 'sun' => 1);
    return serialize($today);
  }
}   


// 增加一个代理，适配器
class AdapterTainqi extends tianqi {
  public static function show() {
    $today = parent::show();
    $today = unserialize($today);
    $today = json_encode($today);
    return $today;
  }
}



// =====客户端调用=====
$taiqni = unserialize(tianqi::show());
echo '温度：',$taiqni['tep'], '风力:', $taiqni['wind'] , '<br/>';



// java客户端，并不认识PHP的串行化后的字符串。使用适配器模式，转成想通模式。

$tq = AdapterTainqi::show();
$td = json_decode($tq);
echo '温度：',$td->tep, '风力:', $td->wind;

