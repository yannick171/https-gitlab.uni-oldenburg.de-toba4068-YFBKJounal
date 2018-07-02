<?php
    session_start();

    print_r($_POST);
    try {
        $db = new PDO('sqlite:../SQLData/articles.db');

        $db ->beginTransaction();

        foreach (array_keys($_POST) as $value) {
            $db->query("DELETE FROM article where id=$value");
            unlink('../../pdfsOfArticles/artikel%'.$value.'.pdf');
            print_r($value);
        }
        $db ->commit();
    }catch (Exception $e){
        $db->rollBack();
        echo "An error has occurred";
    }
    header("Location: ../../autor.php");
    exit();
?>