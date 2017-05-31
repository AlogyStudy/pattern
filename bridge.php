<?php

  // 桥接模式 bridge

// 功能：论坛站内给用户发送消息，可以是站内短信，emial，手机信息
interface Msg {
  public function send($to, $content) {
  }
}
// 一个类一般只完成一件事情， 如果有多件事情，需要使用抽象类或者接口.

class zn implements Msg {
  public function send($to, $content) {
    echo '站内短信给：', $to, '内容是', $content;
  }
}

class emial implements Msg {
  public function send($to, $content) {
    echo 'emial给：', $to, '内容是', $content;
  }
}

class sms implements Msg {
  public function send($to, $content) {
    echo '短信给：', $to, '内容是', $content;
  }
}


//  需求：内容也分为普通，加急，特急
class zncommon extends Msg {
}
class znwarn extends Msg {
}
class zndanger extends Msg {
}
class emialcommon extends Msg {
}
class emialwarn extends Msg {
}
class emialdanger extends Msg {
}
class smscommon extends Msg {
}
class smswarn extends Msg {
}
class smsdanger extends Msg {
}

// 思考：
// 信的发送方式是一个变化因素， 信的紧急程度是一种方式，为了不修改父类，考虑这两个因素的组合，不停产生新类.

// 这个世界上的因素都不是单一的，都是相互耦合的.

// 使用桥接模式，来增加耦合。