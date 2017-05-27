<?php

abstract class Tiger {
  public abstract function climb();
}

class XTiger extends Tiger {
  public function climb() {
    echo 'Drop' , '<br/>';
  }
}

class MTiger extends Tiger {
  public function climb() {
    echo 'Up' , '<br/>';
  }
}

class Cat {
  public function climb() {
    echo 'Fly';
  }
}

class Client {
  public static function call(Tiger $animal) { // 参数限定不严格，可以更加灵活, 可以传递一个父类类型，就可以有不同的子类形态
    $animal->climb();
  }
}

Client::call(new XTiger());
Client::call(new MTiger());
Client::call(new Cat()); // 报错

?>