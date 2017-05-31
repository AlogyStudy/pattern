<?php

// 场景：发布一篇文章

class Article {
  protected $content;

  public function __construct($content) {
    $this->content = $content;
  }

  public function decorator() {
    return $this->content;
  }

}

$art = new Article('goods goods study, day day up <br/>');

echo $art->decorator();

// -----------------------------------------------------
// 文章需要， 需要编辑人员专门编辑
class BianArt extends article {
  // 重新加工对decorator
  public function summary() {
    return $this->content . '编辑摘要 <br/>';
  }
}

$art = new BianArt('goods goods study, day day');
echo $art->summary();


// -----------------------------------------------------
// 文章需要， 需要做SEO
class SeoArt extends BianArt {
  public function seo() {
    $content = $this->summary();
    return $content . 'seo <br />';
  }
}

$art = new SeoArt('lz');
echo $art->seo();


// -----------------------------------------------------
// 文章需要，广告部单独管理
class Ad extends SeoArt {
  // 层次越来越深，目的是：给文章添加各种内容

}

// 继承层次越来越多，装饰器模式可以解决，变成俩级继承
