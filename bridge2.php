<?php

// 桥接模式 bridge

abstract class info {
  protected $send = null;

  public function __construct($send) {
    $this->send = $send;
  }

  abstract public function msg($content);

  public function send($to, $content) {
    $content = $this->msg($content);
    $this->send->send($to, $content);
  }
}

class zn {
  public function send($to, $content) {
    echo 'zn: ', $to, '内容是:', $content;
  }
}

class email {
  public function send($to, $content) {
    echo 'email: ', $to, '内容是:', $content;
  }
}

class sms {
  public function send($to, $content) {
    echo 'sms: ', $to, '内容是:', $content;
  }
}


class commonInfo extends info {
  public function msg($content) {
    return 'common'. $content;
  }
}

class warnInfo extends info {
  public function msg($content) {
    return 'warn'. $content;
  }
}

class dangerInfo extends info {
  public function msg($content) {
    return 'danger'. $content;
  }
}


// 站内发普通信息
$commonInfo = new commonInfo(new zn());
$commonInfo->send('小明', '吃晚饭');


// sms发普通信息
$commonInfo = new commonInfo(new sms());
$commonInfo->send('小红', '吃晚饭');