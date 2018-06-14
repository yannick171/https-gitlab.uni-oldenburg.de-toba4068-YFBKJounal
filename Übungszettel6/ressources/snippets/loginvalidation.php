<?php
    session_start();

    $email = $_POST["email"];

    $db = new PDO('sqlite:../SQLData/user.db');

    $result = $db -> query("SELECT email, firstName, lastName, password, infoText, id FROM user WHERE email='$email'");
    //print_r($result);
    $entry = $result->fetch(PDO::FETCH_ASSOC);
    if($entry["password"] == $_POST["pw"]){
      $_SESSION["email"] = $email;
      $_SESSION["nachname"] = $entry["firstName"];
      $_SESSION["vorname"] = $entry["lastName"];
      $_SESSION["infoText"] = $entry["infoText"];
      $_SESSION["userId"] = $entry["id"];
      $_SESSION["loggedIn"] = "true";
      //echo "alles korrekt";
    }

    $db = NULL;

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