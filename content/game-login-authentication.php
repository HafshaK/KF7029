
<?php
require_once('game_header_footer_func.php');
echo makePageStart("Quotify - Login Process");

//Authentication process for the user logging in

		
		if (session_status() == PHP_SESSION_NONE) {
			session_start();
		}
		include('dbconn.php'); 
		if ($conn->connect_error) {
			die("Connection failed: " . $conn->connect_error);
		}

		$user_name = $_POST['user_name'];
		$password = $_POST['password'];
		
		if (!$user_name || !$password) {
			// Handle invalid input, e.g., redirect to an error page or show an error message
			echo "<section class='game-form'>";
				$message_head = "Login Failed!!!";
				$message_body = "Invalid user name or password.";
				$link = "https://w22055173.nuwebspace.co.uk/KF7029/content/game_login.php";
				$linkText = "Try Again";
				echo displayAlert($message_head, $message_body, $link, $linkText);
				echo "</section>";
		}
		
		/* Query the users database table to get the password_hash  for the username entered by the user, using a placeholder for the username */
		$querySQL = "SELECT password_hash, user_no, user_name, score  FROM game_users WHERE user_name = ?";
		$stmt = mysqli_prepare($conn, $querySQL);
		mysqli_stmt_bind_param($stmt, "s", $user_name);
		mysqli_stmt_execute($stmt);

		$queryresult = mysqli_stmt_get_result($stmt);
		
		$userRow = mysqli_fetch_assoc($queryresult);
		
		if ($userRow) {
			$password_hash = $userRow['password_hash'];
			$_SESSION['user_name'] = htmlspecialchars($userRow['user_name'], ENT_QUOTES, 'UTF-8');
			$_SESSION['password_hash'] = $userRow['password_hash'];
			$_SESSION['score'] = $userRow['score'];
			$_SESSION['user_no'] = $userRow['user_no'];
			if (password_verify($password, $password_hash)) {
				
				$_SESSION['logged-in'] = true;
				echo makeHeader();
				echo "<section class='game-form'>";
				echo "<h2 class='game-alert-heading'>Login Successful</h2><br>";
				echo "Welcome Back," . $_SESSION['user_name'] . ".";
				echo "<a href='https://w22055173.nuwebspace.co.uk/KF7029/content/game_index.php' class='game-button'>Go to Home Page<br></a>";
				
				echo "</section>";
			} else {
				echo makeHeader();
				echo "<section class='game-form'>";
				
				$message_head = "Login Failed!!!";
				$message_body = "Password is incorrect";
				$link = "https://w22055173.nuwebspace.co.uk/KF7029/content/game_login.php";
				$linkText = "Try Again";
				echo displayAlert($message_head, $message_body, $link, $linkText);
				echo "</section>";
			}
			
		} else {
				echo makeHeader();
				echo "<section class='game-form'>";
				$message_head = "Login Failed!!!";
				$message_body = "username does not exist";
				$link = "https://w22055173.nuwebspace.co.uk/KF7029/content/game_login.php";
				$linkText = "Try Again";
				echo displayAlert($message_head, $message_body, $link, $linkText);
				echo "</section>";
			}
		
		
	$conn->close();
echo  makePageEnd();
?>