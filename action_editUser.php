<?php
  include_once('includes/init.php');
  
  $old_username = $_SESSION['username'];
  $username = trim(strip_tags($_POST['username']));
  $password = $_POST['password']; 
  $name = $_POST['name'];  

  if(empty($username)) {
    echo 'NO USERNAME';
    //header('Location: todoPage.php?list='.$todoList);
    return;
  }
  
  if(empty($password)) {
    echo 'NO PASSWORD';
    //header('Location: index.php');
    return;
  }

  if(empty($name)) {
    echo 'NO NAME';
    //header('Location: index.php');
    return;
  }

  editUser($old_username, $username, $password, $name);
  
  header('Location: index.php');  
?>
