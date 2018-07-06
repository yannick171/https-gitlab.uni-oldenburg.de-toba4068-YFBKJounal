<?php

function showArticles($status = "%", $owner = "%")
{
    try {
        $db = new PDO('sqlite:ressources/SQLData/articles.db');
        $db->beginTransaction();
        $result = ($db->query("SELECT id, title, author, uploadDate FROM article WHERE statusOfArticle like $status and owner like $owner"));
        $db->rollBack();

        if (empty($result)){
            return false;
        }else {
            return ($result->fetchAll(PDO::FETCH_ASSOC));
        }
    }catch (Exception $e){
        $db ->rollBack();
        echo "An error has occurred";
    }
}

?>