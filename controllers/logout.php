<?php
  session_start();
  session_unset();
  session_destroy();
  ob_start();
  header("location: ../views/index.php");
  ob_end_flush();
?>
