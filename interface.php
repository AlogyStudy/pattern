<?php


// 共同接口
// 数据库的接口
interface DB {
  function conn();
}

// 创造数据库的接口
interface Factory {
  function createDB();
}

// 服务端开发(不知道将会被谁调用)
class DbMysql implements DB {
  public function conn() {
    echo 'conn mysql <br/>';
  }
}

class DbSqlite implements DB {
  public function conn() {
    echo 'conn sqlite  <br/>';
  }
}


class MySqlFactory implements Factory {
  public function createDB() {
    return new DbMysql();
  }
}

class SqliteFactory implements Factory {
  public function createDB() {
    return new DbSqlite();
  }
}



// ==== 服务器端添加oracle类
// 进行扩展，避免对原有数据进行修改
class orcale implements DB {
  public function conn() {
    echo 'conn orcal <br />';
  }
}

class orcaleFactory implements Factory {
  public function createDB() {
    return new orcale(); 
  }
}


// ------客户端开始调用.

$fact = new MysqlFactory();
$db = $fact->createDB();
$db->conn();


$fact = new SqliteFactory();
$db = $fact->createDB();
$db->conn();