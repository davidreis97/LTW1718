<!DOCTYPE html>
<html>
<head>
	<title>Todo List</title>
	<link rel="stylesheet" href="css/style.css"/>
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet"/>
	<link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet"> 
</head>
<body>
	<header>
		<a href="index.php"><h1>TodoList</h1></a>
		<div id="user">
      <?php
        if (isset($_SESSION['username']))
          include ('templates/common/logout_form.php');
        else
          include ('templates/common/login_form.php');
      ?>
    </div>
	</header>
