<?php
  session_start();
  $_SESSION["logout"]="true";
  $_SESSION["loggedIn"] ="";
  header("Location: ../../startseite.php");
  exit();
 ?>
