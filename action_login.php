<?php
include_once('includes/init.php');
$username = trim(strip_tags($_POST['username']));
$password = $_POST['password'];

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

if (isLoginCorrect($_POST['username'], $_POST['password'])) {
  setCurrentUser($_POST['username']);
}else{
  echo 'ERROR LOGGING IN';
}
header('Location: index.php'); 
?>
