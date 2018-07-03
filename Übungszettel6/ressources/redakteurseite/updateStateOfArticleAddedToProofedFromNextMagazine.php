<?php
$articlesDb = new PDO('sqlite:../SQLData/articles.db');
if(isset($_POST["id"]))
{
    $sql = "UPDATE article SET statusOfArticle = 1 WHERE id = " . $_POST["id"];
    $articlesDb->exec($sql);
}
?>