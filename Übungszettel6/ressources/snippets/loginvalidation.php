<?php
  session_start();

  $email = $passwort ="";

  if ($_SERVER["REQUEST_METHOD"] == "POST") {
    //print_r($_SESSION);
    $email = $_POST["email"];
    $passwort = $_POST["pw"];

    $string = file_get_contents("ressources/json/user.json");
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
  }

  header("Location: ../../startseite.php");
  exit();
?>