<?php
    session_start();

    try {
        $db = new PDO('sqlite:../SQLData/user.db');

        $db->beginTransaction();
        $stmt = $db->prepare("SELECT email, firstName, lastName, password, infoText, id FROM user WHERE email=:inputEmail ");
        $stmt->bindValue(":inputEmail", $_POST["email"], PDO::PARAM_STR);
        $stmt ->execute();

        $entry = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($entry["password"] == hash("sha256",$_POST["pw"])) {
            $_SESSION["email"] = $_POST["email"];
            $_SESSION["nachname"] = $entry["firstName"];
            $_SESSION["vorname"] = $entry["lastName"];
            $_SESSION["infoText"] = $entry["infoText"];
            $_SESSION["userId"] = $entry["id"];
            $_SESSION["loggedIn"] = "true";
            //echo "alles korrekt";
        }
        $db->rollBack();
        $db = NULL;

    }catch(Exception $ex){
        $db->rollBack();
    }
    header("Location: ../../startseite.php");
    exit();

  //print_r($_SERVER['DOCUMENT_ROOT']);
  /*header("Location: ../../startseite.php");
  exit();
  /*
  if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $email = $_POST["email"];
    $passwort = $_POST["pw"];

    $string = file_get_contents("../json/user.json");
    $user = json_decode($string, true);

    foreach ($user as $key) {
      if($key["email"] != $email){
        continue;
      }else {
        if($key["passwort"]!= $passwort){
          break;
        }
        $_SESSION["email"] = $email;
        $_SESSION["nachname"] = $key["nachname"];
        $_SESSION["vorname"] = $key["vorname"];
        $_SESSION["infoText"] = $key["infoText"];
        $_SESSION["loggedIn"] = "true";
      }
    }
  }*/
 // header("Location: ../../startseite.php");
  //exit();
?>