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
			<form action="action_login.php" method="post">
				<input type="text" placeholder="username" name="username">
				<input type="password" placeholder="password" name="password">
				<div>
					<input type="submit" value="Login">
					<a href="register.php">Register</a>
					<a href="logout.php">Logout</a>
				</div>
			</form>
		</div>
	</header>
