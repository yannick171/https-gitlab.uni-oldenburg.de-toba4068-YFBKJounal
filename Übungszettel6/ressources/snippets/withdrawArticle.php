<?php
    session_start();

    try {
        $db = new PDO('sqlite:../SQLData/articles.db');

        $db ->beginTransaction();

        foreach (array_keys($_POST) as $value) {
            $db->query("DELETE FROM article where id=$value");
        }
        $db ->commit();
    }catch (Exception $e){
        $db->rollBack();
        echo "An error has occurred";
    }
    header("Location: ../../autor.php");
    exit();
?>