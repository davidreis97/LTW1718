<!DOCTYPE html>
<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Todo List</title>
	<link rel="stylesheet" href="css/style.css"/>
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet"/>
	<link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
</head>
<body>
	<header>
		<a href="todoPage.php"><h1>TodoList</h1></a>
		<div id="user">
      <?php
        if (isset($_SESSION['username']))
          include ('templates/common/logout_form.php');
        else
          include ('templates/common/login_form.php');
      ?>
    </div>
		<?php if (isset($_SESSION['loginError'])){
			?><div id="error_login">
				<p>Error username or password!</p>
			</div><?php
			unset($_SESSION['loginError']);
		} ?>
	</header>
