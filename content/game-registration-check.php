
<?php

require_once('game_header_footer_func.php');
echo makePageStart("Quotify - Checking");
echo makeHeader();
//Registeration form
echo "<section class= 'registration-form'>";


				include('dbconn.php'); 
				if ($conn->connect_error) {
				die("Connection failed: " . $conn->connect_error);
				}
				
				
				$password = 			trim($_POST['password']);
				$user_name = 		trim($_POST['user_name']);


				
				$link = "https://w22055173.nuwebspace.co.uk/KF7029/content/game-register.php";
				$linkText = "Go Back";
				// Checking if password meets the specified criteria
				function is_valid_password($password) {
					$pattern = '/^.{8}$/';
					return preg_match($pattern, $password);
				}
				
				$message_head = "Password is invalid!!!";
				$message_body = "It must be 8 characters long<br>";
					if (!is_valid_password($password)) {
						echo displayAlert($message_head, $message_body, $link, $linkText);
					} 
					
				
				function is_valid_user($user_name) {
					$pattern = '/^(?=.*[A-Za-z])[A-Za-z]{1,40}$/';
					return preg_match($pattern, $user_name);
				}
				$message_head = "Name is invalid!!!";
				$message_body = "Name must contain only alphabetic characters<br>";
				if (!is_valid_user($user_name, $user_name)) {
					echo displayAlert($message_head, $message_body, $link, $linkText);
				}
				
				// Checking if the user name exist or not
				$checkUserQuery = "SELECT user_no FROM game_users WHERE user_name = ?";
				$stmt = $conn->prepare($checkUserQuery);
				$stmt->bind_param("s", $user_name);
				$stmt->execute();
				$result = $stmt->get_result();
				if ($result) {
					$message_head = "User Name already in use!!!";
					$message_body = "Please use a different user name<br>";
					if ($result->num_rows > 0) {
						echo displayAlert($message_head, $message_body, $link, $linkText);
					} 	
				}			
					//Hashing Password
				    $password_hash = password_hash($password, PASSWORD_DEFAULT);
					
					
					//Sending file to database after confirmation
	
					echo "<div class='game-form'>
					<h2 class='game-alert-heading'>Kindly check before proceeding</h2><br>
					User Name:  " . htmlspecialchars($user_name) . "<br>

					<form action='https://w22055173.nuwebspace.co.uk/KF7029/content/game-registration-upload-db.php' method='post'>
					<input type='hidden' name='user_name' value='$user_name'>
					<input type='hidden' name='password_hash' value='$password_hash'>
					<a href='https://w22055173.nuwebspace.co.uk/KF7029/content/game-register.php' class='more-url'><< Go Back</a>
					<input type='submit' value='Confirm and Register' class='game-button'><br>
					</form>
					
					</div>";
				
				$stmt->close();
				$conn->close();
				
				
						
					
echo "</section>";
echo  makePageEnd();
?>