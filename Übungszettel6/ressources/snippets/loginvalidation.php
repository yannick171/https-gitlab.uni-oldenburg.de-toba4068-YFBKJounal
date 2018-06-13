<?php
  session_start();

  $email = $_POST["email"];

  $db = new PDO('sqlite:../SQLData/user.db');

  $result = $db -> query("SELECT password FROM user WHERE email='$email'");
  $row = $result->fetch(PDO::FETCH_ASSOC);
  print_r($row);
  if($result == $_POST["pw"]){
      $_SESSION["email"] = $email;
      $_SESSION["nachname"] = $key["nachname"];
      $_SESSION["vorname"] = $key["vorname"];
      $_SESSION["infoText"] = $key["infoText"];
      $_SESSION["loggedIn"] = "true";
  }

  $db = NULL;

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
  }
  header("Location: ../../startseite.php");
  exit();
?>