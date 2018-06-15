<?php

function showArticles($status = "%", $owner = "%")
{
    $db = new PDO('sqlite:ressources/SQLData/articles.db');
    $result = ($db->query("SELECT id, title, author, uploadDate FROM article WHERE statusOfArticle like $status and owner like $owner"));
    return ($result->fetchAll(PDO::FETCH_ASSOC));
}

?>