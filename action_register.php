<?php
  include_once('includes/init.php');
  
  $username = trim(strip_tags($_POST['username']));
  $password = $_POST['password']; 
  $name = $_POST['name'];  

  createUser($username, $password, $name);
  
  header('Location: index.php');  
?>
