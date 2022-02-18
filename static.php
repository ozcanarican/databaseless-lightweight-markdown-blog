<?
include "blogconf.php";
require __DIR__ . '/vendor/autoload.php';
$parse = new Parsedown();
include "BlogHelper.php";

if (isset($_GET['file'])) {
    $helper = new BlogHelper();
    $file = $_GET['file'];
    $staticFile = $_GET['file'] . ".md";
    $article = $helper->getStatic($staticFile);

    echo $twig->render('read.html', [
        'title' => $article["data"]["title"],
        'desc' => $article["data"]["description"],
        'post' => $parse->text($article["content"]),
        'image' => $article["data"]["image"]
    ]);
} else {
    //if no file request, redirect to landing
    header("Location: /");
}