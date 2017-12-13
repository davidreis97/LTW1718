<?php
  include_once('includes/init.php');

  $username = trim(strip_tags($_GET['username']));

  if(empty($username)) {
    echo 'NO USERNAME';
    return;
  }

  if (userExists($username)){
      echo 'USER EXISTS';
  }else{
      echo 'USER NOT EXISTS';
  }
?>
