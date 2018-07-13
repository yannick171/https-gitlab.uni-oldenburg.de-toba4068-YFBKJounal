<?php
    if(!isset($_SESSION)){
        session_start();
    }

function withdraw($db){

    try {
        $db ->beginTransaction();

        $stmt=$db->prepare("DELETE FROM article where id=:id");

        $stmt->bindParam(":id",$_POST['target']);

        if ($stmt->execute()){
            unlink('../archiv/artikel/artikel%'.$_POST['target'].'.pdf');
            $db ->commit();
        }else{
            $db->rollBack();
        }

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

        $articles = array();

        if ($status == -1){

            $stmt = $db->prepare("SELECT id, title, author, uploadDate, abstract FROM article WHERE owner like :owner");
            $stmt -> bindParam(":owner",$owner);
            $stmt->execute();
            array_push($articles,$stmt->fetchAll(PDO::FETCH_ASSOC) );

        }else{

            foreach ($status as $value)
			{
				$sql = "SELECT id, title, author, uploadDate, abstract FROM article WHERE statusOfArticle like :status";
				if(strcmp($owner, "%") != 0)
				{
					$sql = $sql . " and owner like :owner";
					$stmt = ($db->prepare($sql));
					$stmt -> bindParam(":owner",$owner);
					$stmt -> bindParam(":status",$value);
				}
				else
				{
					$stmt = ($db->prepare($sql));
					$stmt -> bindParam(":status",$value);
				}
				
                $stmt->execute();
                $articles=array_merge($articles,$stmt->fetchAll(PDO::FETCH_ASSOC) );
            }
        }

        $db->rollBack();

        if (empty($articles)){
            return 0;
        }else {
            return $articles;
        }
    }catch (Exception $e){
        $db ->rollBack();
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


function search($p){

    $Suchparameter = $p;

    $articlesDb = new PDO('sqlite:../SQLData/articles.db');
    $allArticles = $articlesDb->query('SELECT * FROM article');

    $result = array();


    //Der eigentliche Suchalgorithmus.Es wird je nachdem wieviele Suchkriterien ausgewählt wurden, die Suche verstärkt.
    //Wenn auch nur ein "Kriterium" nicht erfüllt ist, dann wird der nächste Eintrag in der DB angeschaut.

    while ($article = $allArticles->fetch())
    {
        if(isset($Suchparameter['search']) && !empty($Suchparameter['search']) && !(strpos($article["title"], $Suchparameter['search']))){
            continue;
        }

        if (isset($Suchparameter['author']) && !empty($Suchparameter['author'])&& !(strpos($article["author"], $Suchparameter['author']))){
            continue;
        }

        if (isset($Suchparameter['uploadDate']) && !empty($Suchparameter['uploadDate']) && !(strpos($article["uploadDate"], $Suchparameter['uploadDate']))){
            continue;
        }

        else
        {

            $append = array('id'=> $article['id'],
                'title' => $article["title"],
                'abstract' => $article["abstract"],
                'author' => $article["author"],
                'pdfPath' => $article["pdfPath"]
            );
            array_push($result,$append);
        }
    }
    return $result;
}

//Über den "context" wird die Datei angesprochen und führt die entsprechende(n) Methode(n) aus

if (isset($_POST['context']) && !empty($_POST['context'])){
    $context = $_POST['context'];
    $db = new PDO('sqlite:../SQLData/articles.db');

    switch ($context){
        case "upload":
            echo upload($db);
            header("Location: ../../autor.php");
            break;

        case "withdraw":
            withdraw($db);
            header("Location: ../../autor.php#uploadArea");
            break;
    }
    $db=null;

}

if (isset($_GET) && !empty($_GET)){
    echo json_encode(array(search($_GET)));
}

?>
