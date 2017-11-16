<?php
include_once('includes/init.php');
//include_once('database/user.php');

  if (isLoginCorrect($_POST['username'], $_POST['password'])) {
    setCurrentUser($_POST['username']);
	echo "user is" + $_SESSION['name'];
  }
  header('Location: ' . $_SERVER['HTTP_REFERER']);
?>
