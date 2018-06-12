<?php
  if (!isset($_SESSION)) {
    session_start();
  }

  if(isset($_SESSION["logout"])){
    $_SESSION = array();
    session_destroy();
  }

 ?>
