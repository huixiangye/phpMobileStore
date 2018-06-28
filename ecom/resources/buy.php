<?php 
  require_once("../resources/config.php"); 

  if (isset($_SESSION['user_id'])) {

    checkout();
  }
?>