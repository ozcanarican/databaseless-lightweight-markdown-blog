<?
require __DIR__ . '/vendor/autoload.php';
$parse = new Parsedown();

include "BlogHelper.php";
$helper = new BlogHelper();
//print_r($helper->getTags());
//print_r($helper->getArticles("makaleler", 3, 0));
$makale = $helper->getArticle("makaleler", "2021-07-11-git-ve-github-nedir.md");
echo $parse->text($makale["content"]);