<?php
  include_once('includes/init.php');

  $username = trim(strip_tags($_POST['username']));
  $password = $_POST['password'];
  $name = trim(strip_tags($_POST['name']));

  if(empty($username)) {
    echo 'NO USERNAME';
    //header('Location: todoPage.php?list='.$todoList);
    return;
  }

  if(!preg_match("/^.*(?=.*[A-Z])(?=.*[0-9]).{7,}$/", $password)) {
    echo 'NO PASSWORD';
    //header('Location: index.php');
    return;
  }

  if(empty($name)) {
    echo 'NO NAME';
    //header('Location: index.php');
    return;
  }

  createUser($username, $password, $name);

  header('Location: index.php');
?>
