<section id="registerForm">
	<form action="action_editProfile.php" method="post">
		<label for="name">Name</label>
		<input type="text" placeholder="name" name="name" id="name" value="<?=$user['name']?>">
		<label for="username">Username</label>			
		<input type="text" placeholder="username" name="username" id="username" value="<?=$user['username']?>">
		<label for="password">Password</label>						
		<input type="password" placeholder="password" name="password" id="password">
		<label for="confirmPassword">Confirm Password</label>									
		<input type="password" placeholder="confirm password" name="confirmPassword" id="confirmPassword">			
	    <input type="submit" value="Confirm Changes">
	</form>
</section>