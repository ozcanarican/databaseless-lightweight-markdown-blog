<?php
include "blogconf.php";
include "vendor/autoload.php";
include "BlogHelper.php";
$helper = new BlogHelper();

$yourSiteUrl = 'https://ozcanarican.com';

// Setting the current working directory to be output directory
// for generated sitemaps (and, if needed, robots.txt)
// The output directory setting is optional and provided for demonstration purposes.
// The generator writes output to the current directory by default. 
$outputDir = getcwd();

$generator = new \Icamys\SitemapGenerator\SitemapGenerator($yourSiteUrl, $outputDir);
$generator->setMaxUrlsPerSitemap(50000);
$generator->setSitemapFileName("sitemap.xml");
$generator->setSitemapIndexFileName("sitemap-index.xml");

$hepsi = $helper->getAll();
foreach ($hepsi as $tag => $dosyalar) {
    foreach ($dosyalar as $dosya) {
        $generator->addURL('/' . POSTPREFIX . '/' . $tag . '/' . str_replace(".md", "", $dosya), new DateTime(), 'always', 0.5);
    }
}
$generator->flush();


$generator->finalize();
$generator->updateRobots();
$generator->submitSitemap();