<?php
require_once 'vendor/autoload.php';

//--Settings
define("TEMPLATE", "demo");
define("ARTICLE_PATH", "contents/articles");
define("POSTPREFIX", "article");
define("EMAIL", "");
define("EMAILSERVER", "");
define("EMAILUSER", "");
define("EMAILPASS", "");
define("EMAILSUBJECT", "From My Blog");


//-----Do Not Change ----
$root = 'templates/' . TEMPLATE;
$loader = new \Twig\Loader\FilesystemLoader($root);
$twig = new \Twig\Environment($loader, ['debug' => true]);
$twig->addGlobal("prefix", POSTPREFIX);
$twig->addGlobal("root", $root);