<?php

/**
  单例模式
*/

// 第一步，普通类

// class Single {

// }


// $s1 = new Single();
// $s2 = new Single();

// var_dump($s1, $s2);
// var_dump($s1 == $s2);

// ---------------------

// 第二步，封锁new操作
// class Single {
//   // 在new 的时候会触发魔术函数，__constructor，可以在 __constructor 魔术函数中做操作 
//   protected function __constructor() { // 把__constructor()魔术方法保护起来, 导致的后果，一个对象都没法new。（大门关上了，需要开窗）

//   }
// }

// $s1 = new Single();


// ---------------------

// 第三步，留接口来new对象
// class Single {
//    public static function getIns() { // getIns的控制权在class内部，可以在getIns做手脚
//      return new self(); // 返回自身实例
//    } 
//    protected function __constructor() {

//    }
// }

// $s1 = Single::getIns();
// $s2 = Single::getIns();

// var_dump($s1, $s2);
// var_dump($s1 == $s2);



// ---------------------

// 第四步，getIns要预先判断实例
// class Single {
//    protected static $ins = null;
//    public static function getIns() { // getIns的控制权在class内部，可以在getIns做手脚
//      if (self::$ins === null) {
//        self::$ins = new self();
//      }
//      return self::$ins;  // 返回自身实例
//    } 
//    protected function __constructor() {

//    }
// }

// $s1 = Single::getIns();
// $s2 = Single::getIns();

// var_dump($s1, $s2);
// var_dump($s1 == $s2); // true

// 问题 ：继承之后 constructor 被公开， 可以使用final
// class multi extends Single {
//   public function __constructor() { // 继承之后 constructor 被公开

//   }
// } 




// ---------------------

// 第五步，final,防止继承时，被修改权限
// class Single {
//    protected static $ins = null;
//    public static function getIns() { // getIns的控制权在class内部，可以在getIns做手脚
//      if (self::$ins === null) {
//        self::$ins = new self();
//      }
//      return self::$ins;  // 返回自身实例
//    } 
//    final protected function __constructor() { // 方法前加 final，则方法不能被覆盖，类前加final，则类不能被继承。

//    }
// }

// class multi extends Single {
//   public function __constructor() { // 继承之后 constructor 被公开

//   }
// } 

// $s1 = Single::getIns();
// $s2 = clone $s1; // 克隆了，又产生了多个对象.

// var_dump($s1, $s2);
// var_dump($s1 === $s2); // true




// ---------------------

// 第六步，禁止clone
class Single {
   protected static $ins = null;
   public static function getIns() { // getIns的控制权在class内部，可以在getIns做手脚
     if (self::$ins === null) {
       self::$ins = new self();
     }
     return self::$ins;  // 返回自身实例
   } 
   final protected function __constructor() { // 方法前加 final，则方法不能被覆盖，类前加final，则类不能被继承。

   }

   // 封锁clone
   final protected function __clone() {

   }
}

$s1 = Single::getIns();
$s2 = clone $s1; // 克隆了，又产生了多个对象.

var_dump($s1, $s2);
var_dump($s1 === $s2); // true
