<?php
  session_start();

  $string = file_get_contents("../json/article.json");
  $articles = json_decode($string,true);

    if ( isset($_POST["titlename"]) && isset($_POST["abstract"]) ) {
      $append = array(
        "owner" => $_SESSION["email"],
        "abstract" => $_POST["abstract"],
        "title" => $_POST["titlename"],
        "authors"=> $_POST["autorvorname-1"] . " " . $_POST["autornachname-1"],
        "uploadDate" => date("r"),
        "status" => "0"
      );

      array_push($articles, $append);
      $newFile = json_encode($articles);

      if (!is_writeable("../json/article.json")) {
        echo "nicht writeable, ";
      }
      if(file_put_contents("../json/article.json", $newFile)){}else {
        echo "nicht hochgeladen";
      };
    }
    header("Location: ../../autor.php");
 ?>
