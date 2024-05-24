  
<?php
require_once('game_header_footer_func.php');
echo makePageStart("Quotify - New Account");
echo makeHeader();
?>


		<!--Registeration form-->
		<section class="game-form">
		<form action="https://w22055173.nuwebspace.co.uk/KF7029/content/game-registration-check.php" method="post">
			<fieldset class="create-account">
			<legend><h1>Create an Account</h1></legend>
				<div id="formGrid">
					<label class="form-label" for="user_name">User Name: </label><br>
					<input type="text" name="user_name" id="user_name" class="customer_forename" required><br>
					<label class="form-label" for="password">Password: </label><br>
					<input type="password" id="password" name="password" required>
					<span class="tooltip">Suggested format: 8 characters long<br>
											</span>
					<br>
					<input type="submit" value="Confirm Detail" class="game-button">
				</div>
				<p>Already have an Account?<a href="https://w22055173.nuwebspace.co.uk/KF7029/content/game_login.php" class="more-url">Log In</a></p>
			</fieldset>
		</form>
		</section>
	

<?php
echo  makePageEnd();
?>