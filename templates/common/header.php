<!DOCTYPE html>
<html>
<head>
	<title>Todo List</title>
	<link rel="stylesheet" href="css/style.css"/>
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet"/>
</head>
<body>
	<header>
		<h1>Todo List</h1>
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