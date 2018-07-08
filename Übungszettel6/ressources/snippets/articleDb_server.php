<?php
    if(!isset($_SESSION)){
        session_start();
    }

function withdraw($db){
    print_r($_POST);
    try {
        //$db = new PDO('sqlite:../SQLData/articles.db');

        $db ->beginTransaction();

        $value = $_POST['target'];
        $db->query("DELETE FROM article where id=$value");
        unlink('../archiv/artikel/artikel%'.$value.'.pdf');
        print_r($value);

        $db ->commit();
    }catch (Exception $e){
        $db->rollBack();
        echo "An error has occurred";
    }
}

function showArticles($status = -1, $owner = "%")
{
    $db = new PDO('sqlite:ressources/SQLData/articles.db');

    try {
        $db->beginTransaction();

        if ($status == -1){

            $result = ($db->query("SELECT id, title, author, uploadDate FROM article WHERE owner like $owner"));

        }else{

            $result = ($db->query("SELECT id, title, author, uploadDate FROM article WHERE statusOfArticle like $status and owner like $owner"));

        }

        $articles = $result->fetchAll(PDO::FETCH_ASSOC);

        $db->rollBack();

        if (empty($result)){
            echo "false";
            return false;
        }else {
            return $articles;
        }
    }catch (Exception $e){
        //$db ->rollBack();
        echo "An error has occurred";
    }
}


function upload($db){

    // File upload
    //ermitteln der nächsten ID
    $result = $db -> query("SELECT seq FROM SQLITE_SEQUENCE WHERE name='article'");
    $nextNumber = ($result->fetchAll(PDO::FETCH_ASSOC))[0]['seq'] + 1;

    $target_dir = "../archiv/artikel/";
    $target_file = $target_dir . 'artikel%'. $nextNumber .'.pdf';

    //echo $nextNumber . "<br>";

    $uploadOk = 1;
    $fileType = strtolower(pathinfo(basename($_FILES["uploadFile"]["name"]), PATHINFO_EXTENSION));


    // Check if file already exists
    /*if (file_exists($target_file))
    {
        return "Sorry, file already exists.";
        $uploadOk = 0;
    }
*/
    // Check file size
    if ($_FILES["uploadFile"]["size"] > 500000) {
        return "Sorry, your file is too large.";
        $uploadOk = 0;
    }

    // Allow certain file formats
    if($fileType != "pdf")
    {
        return "Sorry, only PDF files are allowed.";
        $uploadOk = 0;
    }

    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 1)
    {
        if (move_uploaded_file($_FILES["uploadFile"]["tmp_name"], $target_file))
        {
            echo "The file ". basename( $_FILES["uploadFile"]["name"]). " has been uploaded.";
        }
        else
        {
            $uploadOk = 0;
            return "Sorry, there was an error uploading your file.";
        }
    }
    if($uploadOk == 1)
    {
        try {

            $db->beginTransaction();
            $stmt = $db->prepare("INSERT INTO article (owner, abstract, title, author,statusOfArticle, uploadDate) VALUES (:owner,:abstract,:title,:author,:status,:uploadDate)");

            $counter = -1;
            $authors = "";

            while ((++$counter) <= $_POST["authorCounter"]) {
                if (!isset($_POST["autorvorname-" . ($counter)])) {
                    continue;
                };
                $authors = $authors . $_POST["autorvorname-" . ($counter)] . " " . $_POST["autornachname-" . ($counter)] . ", ";
            }

            $authors = substr($authors, 0, -2);
            $userid = $_SESSION['userId'];
            $abstract = $_POST['abstract'];
            $title = $_POST['titlename'];
            $date = date("d.m.Y, H:i:s");
            $status = 0;

            $stmt->bindParam(":owner", $userid);
            $stmt->bindParam(":abstract", $abstract);
            $stmt->bindParam(":title", $title);
            $stmt->bindParam(":author", $authors);
            $stmt->bindParam(":uploadDate", $date);
            $stmt->bindParam(":status", $status);
            //$stmt->bindParam(":path", $path);


            $stmt->execute();
            $db -> commit();
            return 1;
        } catch (Exception $ex){
            $db -> rollBack();
            return "Error: ". $ex;
        }
    }
}

if (isset($_POST['context']) && !empty($_POST['context'])){
    $context = $_POST['context'];
    $db = new PDO('sqlite:../SQLData/articles.db');


    switch ($context){
        case "upload":
            echo upload($db);
            header("Location: ../../autor.php");
            break;

        case "checkPw":

            break;

        case "search":

            break;

        case "withdraw":
            withdraw($db);
            header("Location: ../../autor.php#uploadArea");
            break;
    }
    $db=null;

}
?>
