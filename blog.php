<?
include "blogconf.php";
require __DIR__ . '/vendor/autoload.php';
$parse = new Parsedown();
include "BlogHelper.php";
$helper = new BlogHelper();

//if it is reading file request
if (isset($_GET['file'])) {
    //get requested file
    $articleFile = $_GET['file'] . ".md";
    $article = $helper->getArticle($_GET['tag'], $articleFile);
    $similiar = $helper->getSimiliar($_GET['tag'], $articleFile, 3);
    echo $twig->render('read.html', [
        'tag' => $_GET['tag'],
        'title' => $article["data"]["title"],
        'desc' => $article["data"]["description"],
        'post' => $parse->text($article["content"]),
        'image' => $article["data"]["image"],
        'date' => date("d.m.Y", $article["data"]["date"]),
        'similiars' => $similiar
    ]);
}
//if it is a tag request
else {
    //set tag
    $tag = $_GET['tag'];
    //posts per page 
    $amount = 20;
    //set and read the page
    $page = 0;
    if (isset($_GET['page'])) {
        $page = $_GET['page'];
    }
    $start = $page * $amount;
    //get articles from that tag
    $posts = $helper->getArticles($tag, $amount, $start);
    //set navigations
    $next = "";
    $pre = "";
    if (count($posts) == $amount) {
        $next = "/" . POSTPREFIX . "/" . $tag . "_page" . ($page + 1);
    }
    if ($page > 0) {
        $pre = "/" . POSTPREFIX . "/" . $tag . "_page" . ($page - 1);
    }

    //final check if there are posts
    if (count($posts) > 0) {
        echo $twig->render('page.html', [
            'tag' => $_GET['tag'],
            'root' => $root,
            'title' => "Yazılım Makaleleri",
            'desc' => "Yazılım ve design hakkındaki kişisel fikirlerimi ve görüşlerimi içeren yazılar",
            'posts' => $posts, 'next' => $next, 'pre' => $pre, "prefix" => POSTPREFIX
        ]);
    } else {
        //if there is no such tag with posts, check if it is a md file
        $result = $helper->findArticle($tag . ".md");
        if ($result) {
            //redirect it to proper url of the md file
            header("Location: /" . POSTPREFIX . "/$result/$tag");
        }
    }
}
