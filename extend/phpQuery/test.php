<?php
header("Content-Type: text/html;charset=utf-8"); 
require('phpQuery/phpQuery.php');
$eg1=phpQuery::newDocumentFile("http://www.whu.edu.cn/tzgg.htm");
// $eg2=phpQuery::newDocumentFile("https://www.baidu.com/");

echo pq("title",$eg1)->html()."<br>";
echo pq("title",$eg1->getDocumentID())->html()."<br>";//$eg1与$eg1->getDocumentID()效果等同
echo pq("title")->html()."<br>";//就近匹配 $eg2

phpQuery::selectDocument($eg1); //默认会使用选定的文档
echo pq("title")->html()."<br>";


// $mes=pq("ul")->html();//获取所有的ul标签中的html内容
// echo $mes;
// echo "<br>___________________<br>";
// $mes=pq("ul,li")->html();//获取所有的ul以及li标签中的html内容
// echo $mes;

// $t=pq("ul[class='article']")->html();//获取ul class="article"的html内容
// echo $t;


$t=pq("ul[class='article']>li:eq(2)")->html();//获取ul class="article" 下第二个子元素li的html内容
echo $t;
// $t=pq("ul[class='article']>li:eq(2)>center>div:eq(1)")->html();
// echo $t."<br>";

// $t=pq("(ul[class='article']>li:eq(2)>center>div:eq(1))")->html();
// echo $t."<br>";
// $t=pq("(ul[class='article']>li:eq(3)>div[class='col-xs-12 col-sm-6 col-md-6']>a")->html();
// echo $t."<br>";

// $t=pq("(ul[class='article']>li:eq(3)>div[class='col-xs-12 col-sm-6 col-md-6']>a")->attr("href");
// echo $t."<br>";