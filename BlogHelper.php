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

    public function getAll($dir = ARTICLE_PATH)
    {
        $result = array();
        $cdir = scandir($dir);
        foreach ($cdir as $key => $value) {
            if (!in_array($value, array(".", ".."))) {
                if (is_dir($dir . DIRECTORY_SEPARATOR . $value)) {
                    $result[$value] = $this->getAll($dir . DIRECTORY_SEPARATOR . $value);
                } else {
                    $result[] = $value;
                }
            }
        }

        return $result;
    }

    public function getTags()
    {
        $tags = array();
        $scanned = $this->scan(ARTICLE_PATH . "/");
        return json_encode($scanned);
    }
    public function getArticles($tag, $amount, $start)
    {
        $articles = $this->scan(ARTICLE_PATH . "/" . $tag . "/");
        $spliced = array_splice($articles, $start, $amount);
        $return = array();
        foreach ($spliced as $file) {
            $article = $this->getArticle($tag, $file);
            array_push($return, array("file" => str_replace(".md", "", $file), "data" => $article['data']));
        }
        return $return;
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
        $data = json_decode($data, true);
        $data["date"] = filectime(ARTICLE_PATH . "/" . $tag . "/" . $article);
        return array("data" => $data, "content" => $content);
    }
}