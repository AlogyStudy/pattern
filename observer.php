<?php

// PHP实现观察者

// PHP5中提供了观察者(observer)和被观察者(subject)接口

/**
  被观察者
 */
class User implements SplSubject {
  public $lognum;
  public $hobby;

  protected $observers = null;

  public function __construct($hobby) {
    $this->lognum = rand(1, 10);
    $this->hobby = $hobby;
    $this->observers = new SplObjectStorage();
  }

  public function login() { // 类或者一个方法，完成一个功能即可. (单一功能原则)
    // 操作session
    $this->notify();
  }

  public function attach(SplObserver $observer) {
    $this->observers->attach($observer);
  }

  public function detach(SplObserver $observer) {
    $this->observers->detach($observer);
  }

  public function notify() {
    $this->observers->rewind();
    while($this->observers->valid()) {
      $observer = $this->observers->current();
      $observer->update($this);
      $this->observers->next();      
    }
  }
}

/**
  观察者
*/

class Secrity implements SplObserver {
  public function update(SplSubject $subject) { // 传入的 对象是$subject，$subject是干什么，随你的意.
    if($subject->lognum < 3) {
      echo '这个第' . $subject->lognum . '次安全登录<br/>';
    } else {
      echo '这个第' . $subject->lognum . '次登录，异常<br/>';
    }
  }    
}


class Ad implements SplObserver {
  public function update(SplSubject $subject) {
    if ($subject->hobby == 'sport') {
      echo 'sport，nba <br/>';
    } else {
      echo 'good good study, day day up<br/>';
    }
  }
}


/**
  Client
*/
$user = new User('study');
$user->attach(new Secrity());
$user->attach(new Ad());

$user->login();
