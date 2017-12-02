<?php
  include_once('includes/init.php');
  session_destroy();
  unset($_SESSION['username']);
  header('Location: index.php');
?>
