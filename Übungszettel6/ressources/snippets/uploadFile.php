<?php
    session_start();

    if ( isset($_POST["titlename"]) && isset($_POST["abstract"]) ){

        $id = $_SESSION['userId'];
        $abstract = $_POST['abstract'];
        $title = $_POST['titlename'];

        echo $id,$abstract,$title,$authors;
        $db = new PDO('sqlite:../SQLData/articles.db');
        $stmt = $db->prepare("INSERT INTO article (owner, abstract, title, author,statusOfArticle, uploadDate) VALUES (:owner,:abstract,:title,:author,:status,:uploadDate)");
        $stmt->bindParam(":owner",$userid);
        $stmt->bindParam(":abstract",$abstract);
        $stmt->bindParam(":title",$title);
        $stmt->bindParam(":author",$authors);
        $stmt->bindParam(":uploadDate", $date);
        $stmt->bindParam(":status", $status);


        $counter = -1;
        $authors ="";
        while((++$counter) <= $_POST["authorCounter"]){
            if (!isset($_POST["autorvorname-". ($counter)])){continue;};
            $authors = $authors . $_POST["autorvorname-". ($counter)] . " " . $_POST["autornachname-". ($counter)] . ", ";
        }

        $authors = substr($authors,0,-2);
        $userid = $_SESSION['userId'];
        $abstract = $_POST['abstract'];
        $title = $_POST['titlename'];
        $date = "heute";
        $status = 0;

        $stmt -> execute();

        $db = NULL;
    }
    
    header("Location: ../../autor.php");
    exit();

 ?>
