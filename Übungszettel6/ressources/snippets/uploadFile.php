<?php
  session_start();

  $string = file_get_contents("../json/article.json");
  $articles = json_decode($string,true);
    //print_r($_POST);

    if ( isset($_POST["titlename"]) && isset($_POST["abstract"]) ) {
      $counter = -1;
      $authors ="";
        while((++$counter) <= $_POST["authorCounter"]){
            if (!isset($_POST["autorvorname-". ($counter)])){continue;};
            $authors = $authors . $_POST["autorvorname-". ($counter)] . " " . $_POST["autornachname-". ($counter)] . ", ";
        }

      $append = [
        "owner" => $_SESSION["email"],
        "abstract" => $_POST["abstract"],
        "title" => $_POST["titlename"],
        "uploadDate" => date("r"),
        "authors"=> substr($authors,0, (strlen($auhors)-2)),
        "status" => "0"
      ];

      array_push($articles, $append);
      $newFile = json_encode($articles,JSON_PRETTY_PRINT);

      //print_r($newFile);

      if (!is_writeable("../json/article.json")) {
        echo "nicht writeable, ";
      }
      if(file_put_contents("../json/article.json", $newFile)){}else {
        echo "nicht hochgeladen";
      };
    }
    header("Location: ../../autor.php");
 ?>
