<?php
    $articlesDb = new PDO('sqlite:../SQLData/articles.db');
    if(isset($_POST["id"]))
    {
        $sql = "UPDATE article SET statusOfArticle = 2 WHERE id = " . $_POST["id"];
        $articlesDb->exec($sql);


        /*$sql = "UPDATE article SET statusOfArticle = 2 WHERE id = (:idValue);";
        $kommando = $db->prepare($sql);

        $kommando->bindParam(":idValue", $_POST["id"]);
        $kommando->execute();*/
    }
?>