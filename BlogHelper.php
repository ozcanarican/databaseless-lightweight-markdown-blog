<?php
class BlogHelper
{
    public function scan($dir)
    {
        $files = array();

        $cdir = scandir($dir);
        foreach ($cdir as $file) {
            if (!in_array($file, array(".", ".."))) {
                $files[$file] = filectime($dir . '/' . $file);
            }
        }
        arsort($files);
        $files = array_keys($files);
        return $files;
    }
    public function getTags()
    {
        $tags = array();
        $scanned = $this->scan(ARTICLE_PATH . "/");
        return json_encode($scanned);
    }
    public function getArticles($tag, $number, $page)
    {
        $start = $page * $number;
        $articles = $this->scan(ARTICLE_PATH . "/" . $tag . "/");
        return array_splice($articles, $start, $number);
    }
    public function getArticle($tag, $article)
    {
        $data = "{}";
        $content = "";
        $file = file_get_contents(ARTICLE_PATH . "/" . $tag . "/" . $article);
        $parts = explode("}", $file);
        if (count($parts) > 0) {
            $data = $parts[0] . "}";
            $content = $parts[1];
        } else {
            $content = $file;
        }
        return array("data" => json_decode($data, true), "content" => $content);
    }
}