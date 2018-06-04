<?php
  if (!isset($_SESSION)) {
    session_start();
  }

  echo $_SESSION["logout"];

  if(isset($_SESSION["logout"])){
    $_SESSION = array();
    session_destroy();
  }

 ?>
