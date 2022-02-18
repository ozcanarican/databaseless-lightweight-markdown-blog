<?php
require_once 'vendor/autoload.php';

//--Settings
define("TEMPLATE", "demo");
define("ARTICLE_PATH", "contents/articles");
define("POSTPREFIX", "icerik");
//-----Do Not Change ----

$root = 'templates/' . TEMPLATE;
$loader = new \Twig\Loader\FilesystemLoader($root);
$twig = new \Twig\Environment($loader, ['debug' => true]);
$twig->addGlobal("prefix", POSTPREFIX);