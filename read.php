<?
include "blogconf.php";
require __DIR__ . '/vendor/autoload.php';
$parse = new Parsedown();
include "BlogHelper.php";
if (empty($_GET['article'])) {
    header("Location: /index.php");
}
if (empty($_GET['tag'])) {
    header("Location: /index.php");
}
//prepare helper class
$helper = new BlogHelper();

//get requested file
$articleFile = $_GET['article'] . ".md";
$article = $helper->getArticle($_GET['tag'], $articleFile);

echo $twig->render('read.html', [
    'root' => $root,
    'title' => $article["data"]["title"],
    'desc' => $article["data"]["description"],
    'post' => $parse->text($article["content"]),
    'image' => $article["data"]["image"],
    'date' => date("d.m.Y", $article["data"]["date"])
]);