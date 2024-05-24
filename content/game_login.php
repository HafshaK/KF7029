<?php
require_once('game_header_footer_func.php');
echo makePageStart("BookChase - Login");
echo makeHeader();
?>

	<div class="content-area">  
		<!--Log in form-->
		<section class="game-form">
		<form action="https://w22055173.nuwebspace.co.uk/KF7029/content/game-login-authentication.php" method="post">
			<fieldset class="create-account">
			<legend><h1>Log In</h1></legend>
				<div id="formGrid">
					<label class="form-label" for="user_name">User Name: </label><br>
					<input type="text" name="user_name" id="user_name" required><br>
					<label class="form-label" for="password">Password: </label><br>
					<input type="password" id="password" name="password" required><br>
					<input type="submit" value="Log In" class="game-button">
					<br>
					
				</div>
				<p>New to Quotify?<a href="https://w22055173.nuwebspace.co.uk/KF7029/content/game-register.php" class="more-url">Create New Account</a></p>
			</fieldset>
			
		</form>
		</section>
	</div>

<?php
echo  makePageEnd();
?>