
<?php

require_once('game_header_footer_func.php');
echo makePageStart("Quotify Account Created");
echo makeHeader();
//Registeration form
echo "<section class= 'registration-form'>";


				// Connecting to database
				include('dbconn.php'); 
				
				
				// Process form data
				$user_name = isset($_POST['user_name']) ? $_POST['user_name'] : '';
				$password_hash = isset($_POST['password_hash']) ? $_POST['password_hash'] : '';
				
				// Validate and sanitize inputs
				$user_name = filter_var($user_name, FILTER_SANITIZE_STRING);


				// Insert data into the database
				$insertSQL = "INSERT INTO game_users (user_name, password_hash) 
						VALUES (?,?)";
				
				if ($stmt = mysqli_prepare($conn,$insertSQL)){
					mysqli_stmt_bind_param($stmt, "ss", $user_name, $password_hash);
					$queryresult = mysqli_stmt_execute($stmt);
					echo "<div class=\"game-form\">";
					echo "<h2 class=\"game-alert-heading\">Account Created</h2><br>";
					echo "<a href='https://w22055173.nuwebspace.co.uk/KF7029/content/game_login.php' class='game-button'>Go to Login Page<br></a>";
					echo "</div>";
					if (!$queryresult) {
						echo "<p>Error: " . mysqli_stmt_error($stmt) . "</p>";
					}
				mysqli_close($conn);
				}
				else {
					echo "Could not prepare statement";
				}
				
			
			
echo "</section>";

echo  makePageEnd();
?>