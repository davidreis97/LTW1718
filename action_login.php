<?php
include_once('includes/init.php');
$username = trim(strip_tags($_POST['username']));
$password = $_POST['password'];
if (isLoginCorrect($_POST['username'], $_POST['password'])) {
  setCurrentUser($_POST['username']);
  }
else{
    $_SESSION['loginError'] = true;
}
header('Location: ' . $_SERVER['HTTP_REFERER']);
?>
