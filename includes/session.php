<?php

  function setCurrentUser($username){
	  session_start();
	  $_SESSION['name'] = $username;
  }
?>
