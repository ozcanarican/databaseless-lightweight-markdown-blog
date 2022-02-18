<?
include "blogconf.php";
require __DIR__ . '/vendor/autoload.php';
$parse = new Parsedown();
include "BlogHelper.php";
$helper = new BlogHelper();
//set tag
$tag = "kodlar";
//posts per page 
$amount = 20;
//set and read the page
$page = 0;
if (isset($_GET['page'])) {
    $page = $_GET['page'];
}
$start = $page * $amount;

$posts = $helper->getArticles($tag, $amount, $start);
//set navigations
$next = "";
$pre = "";
if (count($posts) == $amount) {
    $next = "/" . $tag . "_page" . ($page + 1);
}
if ($page > 0) {
    $pre = "/" . $tag . "_page" . ($page - 1);
}

echo $twig->render('page.html', [
    'root' => $root,
    'title' => "Kod Örnekleri",
    'desc' => "Kod oyun bahçesi. Kod bloklarını birlikte kurcalıyalım. Java Js Kotlin Csharp Pyhon ve dahası",
    'posts' => $posts, 'next' => $next, 'pre' => $pre
]);