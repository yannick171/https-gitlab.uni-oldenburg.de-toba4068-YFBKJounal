<?php
    session_start();

    $db = new PDO('sqlite:../SQLData/articles.db');

    foreach (array_keys($_POST) as $value){
        $db->query("DELETE FROM article where id=$value");
    }

    $db = NULL;
    header("Location: ../../autor.php");
    exit();
?>