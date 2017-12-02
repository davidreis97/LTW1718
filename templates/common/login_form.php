<form action="action_login.php" method="post">
  <input type="text" placeholder="username" name="username">
  <input type="password" placeholder="password" name="password">
  <input type="submit" value="&gt;&gt;">
  <div>
    <a href="register.php">Register</a>
  </div>
  <?php if (isset($_SESSION['loginError'])){
			?><div id="error_login">
				<p>Error username or password!</p>
			</div><?php
			unset($_SESSION['loginError']);
		} ?>
</form>
