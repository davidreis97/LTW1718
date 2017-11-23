<?php
  include_once('includes/init.php');
  
  $username = trim(strip_tags($_POST['username']));
  $password = $_POST['password'];  

  createUser($username, $password);
  
  header('Location: index.php');  
?>
