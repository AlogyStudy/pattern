<?php

// 装饰器模式

class BaseArt {
  protected $content; // 文章内容
  protected $art = null; // 文章对象

  public function __construct($content) {
    $this->content = $content;
  }

  public function decorator() {
    return $this->content;
  }
}  

// 编辑文章
class BianArt extends BaseArt {
  
  public function __construct(BaseArt $art) {
    $this->art = $art;
    $this->decorator();
  } 

  public function decorator() {
    return $this->content = $this->art->decorator() . '编辑人员，文章摘要';
  }
}

// SEO人员
class SeoArt extends BaseArt {
  public function __construct(BaseArt $art) {
    $this->art = $art;
    $this->decorator();
  } 

  public function decorator() {
    return $this->content = $this->art->decorator() . 'SEO';
  }
}


$art = new BaseArt('day day up');
// echo $art->decorator();

$art1 = new BianArt($art);
// echo $art1->decorator();

$art2 = new SeoArt($art1);
echo $art2->decorator();

