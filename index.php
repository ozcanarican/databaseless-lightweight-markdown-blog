<?
include "blogconf.php";
require __DIR__ . '/vendor/autoload.php';
include "BlogHelper.php";

//landing page title
$title = "Özcan ARICAN | Kişisel blog";
//landing page description
$desc = "Yazılım ve design dünyasına ait makaleler yazıyor, kod örnekleri paylaşıyorum";

//prepare helper class
$helper = new BlogHelper();
//get latest post from makaleler
$heroPost = $helper->getArticles("makaleler", 1, 0)[0];
//get 6 more posts from makaleler starting from second one
$posts = $helper->getArticles("makaleler", 6, 1);
//get latest 6 posts from kodlar folder
$codes = $helper->getArticles("kodlar", 6, 0);

echo $twig->render('landing.html', [
    'root' => $root,
    'title' => $title,
    'desc' => $desc,
    'heroPost' => $heroPost,
    'posts' => $posts,
    'codes' => $codes,
]);