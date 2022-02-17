<?
include "blogconf.php";
require __DIR__ . '/vendor/autoload.php';
$parse = new Parsedown();
include "BlogHelper.php";


$helper = new BlogHelper();
//print_r($helper->getTags());
$makaleler = $helper->getArticles("makaleler", 3, 0);
//echo ($makaleler[0]);
$makale = $helper->getArticle("makaleler", $makaleler[0]);
echo $parse->text($makale["content"]);