<?php
session_start();

$string = file_get_contents("../json/article.json");
$articles = json_decode($string,true);

$message = $error = '';

foreach ($_POST as $name => $value) {
    if ($value) {
        unset($articles[substr($name,-1)]);
        $articleValues = array_values($articles);
        $updatedArticles = json_encode($articleValues);
        if(file_put_contents("../json/article.json", $updatedArticles)){}else {
            echo "nicht hochgeladen";
        };
        header("Location: ../../autor.php");
    }else {
        continue;
    }
}
?>