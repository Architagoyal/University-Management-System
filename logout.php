<?php
    
      session_start();
      session_destroy();
      $_SESSION = array();
      header('refresh:1;url=home.php');
      
?>
