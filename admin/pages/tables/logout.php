<?php
session_start();
session_destroy();
  echo "<SCRIPT type='text/javascript'>
    
        window.location.replace('../../../index.php');
        </SCRIPT>";
?>
