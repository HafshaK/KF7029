

<?php
require_once('header_footer_func.php');
echo makePageStart("TSD - Login Process");

//Authentication process for the user logging in

		
		if (session_status() == PHP_SESSION_NONE) {
			session_start();
		}
		include('dbconn.php'); 
		if ($conn->connect_error) {
			die("Connection failed: " . $conn->connect_error);
		}

		$customer_email = filter_input(INPUT_POST, 'customer_email', FILTER_VALIDATE_EMAIL);
		$password = $_POST['password'];
		
		if (!$customer_email || !$password) {
			// Handle invalid input, e.g., redirect to an error page or show an error message
			echo "<section class='registration-form'>";
				$message_head = "Login Failed!!!";
				$message_body = "Invalid email or password.";
				$link = "https://w22055173.nuwebspace.co.uk/KF7013/content/login.php";
				$linkText = "Try Again";
				echo displayAlert($message_head, $message_body, $link, $linkText);
				echo "</section>";
		}
		
		/* Query the users database table to get the password hash for the username entered by the user, using a placeholder for the username */
		$querySQL = "SELECT password_hash, customerID, customer_forename, customer_surname FROM customers WHERE customer_email = ?";
		$stmt = mysqli_prepare($conn, $querySQL);
		mysqli_stmt_bind_param($stmt, "s", $customer_email);
		mysqli_stmt_execute($stmt);

		$queryresult = mysqli_stmt_get_result($stmt);
		
		$userRow = mysqli_fetch_assoc($queryresult);
		
		if ($userRow) {
			$password_hash = $userRow['password_hash'];
			$_SESSION['customerID'] = $userRow['customerID'];
			$_SESSION['forename'] = htmlspecialchars($userRow['customer_forename'], ENT_QUOTES, 'UTF-8');
			$_SESSION['surname'] = htmlspecialchars($userRow['customer_surname'], ENT_QUOTES, 'UTF-8');
			$_SESSION['password_hash'] = $userRow['password_hash'];
			if (password_verify($password, $password_hash)) {
				
				$_SESSION['logged-in'] = true;
				echo makeHeader();
				echo "<section class=\"registration-form\">";
				echo "<div class=\"green-alert\">";
				echo "<h2 class=\"green-alert-heading\">Login Successful</h2><br>";
				echo "Welcome Back," . $_SESSION['forename'] . " " . $_SESSION['surname'] . ".";
				echo "<a href=\"https://w22055173.nuwebspace.co.uk/KF7013/content/index.php\" class=\"submit-button-green\">Go to Home Page<br></a>";
				echo "</div>";
				echo "</section>";
			} else {
				echo makeHeader();
				echo "<section class=\"registration-form\">";
				$message_head = "Login Failed!!!";
				$message_body = "Password is incorrect";
				$link = "https://w22055173.nuwebspace.co.uk/KF7013/content/login.php";
				$linkText = "Try Again";
				echo displayAlert($message_head, $message_body, $link, $linkText);
				echo "</section>";
			}
			
		} else {
				echo makeHeader();
				echo "<section class=\"registration-form\">";
				$message_head = "Login Failed!!!";
				$message_body = "Email does not exist";
				$link = "https://w22055173.nuwebspace.co.uk/KF7013/content/login.php";
				$linkText = "Try Again";
				echo displayAlert($message_head, $message_body, $link, $linkText);
				echo "</section>";
			}
		
		
	$conn->close();
echo  makePageEnd();
?>