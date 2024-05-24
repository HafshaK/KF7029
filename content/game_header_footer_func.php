
<?php
	function makePageStart($pageTitle) {
		session_start() ;
		$pageStartContent = ' ';
		$pageStartContent .= 
		<<<PAGESTART
	
		<!doctype html> 
		<html lang="en">
		<head>
			<meta charset="utf-8">
			<meta name="viewport" content="width=device-width, initial-scale=1.0">
			<link rel="stylesheet" type="text/css" href="https://w22055173.nuwebspace.co.uk/KF7029/asset/stylesheets/game_style.css">
			<title>$pageTitle</title>
		</head>
		<body>
		<div></div>
		PAGESTART;
			return $pageStartContent;
		}
	
    function checkTimeout() {
		
		
		// This function closes the login session after 600 seconds
		$inactive_timeout = 6000; 
		
		// Check if the session variable for the last activity timestamp is set
		if (isset($_SESSION['last_activity'])) {
			$elapsed_time = time() - $_SESSION['last_activity'];
		
			
			if ($elapsed_time > $inactive_timeout) {
				// When  elapsed time exceeds the inactive timeoutthe user is logged out of  the session
				session_unset();
				session_destroy();
		
				// Redirect to the login page or another appropriate action
				header("Location: https://w22055173.nuwebspace.co.uk/KF7029/content/game_login.php");
				exit();
			}
		}
		
		// Update the last activity timestamp
		$_SESSION['last_activity'] = time();
		
	}
		
	function updateStatus() {
		include('dbconn.php'); 
		if ($conn->connect_error) {
			die("Connection failed: " . $conn->connect_error);
		}
		if (array_key_exists('logged-in',$_SESSION)) {
			if ($_SESSION['logged-in']) {
				if (isset($_SESSION['logged-in']) && $_SESSION['logged-in']) {
				$user_name = isset($_SESSION['user_name']) ? $_SESSION['user_name'] : '';
				$user_no = isset($_SESSION['user_no']) ? $_SESSION['user_no'] : '';
					$query = "SELECT score FROM game_users WHERE user_no = ?";
                $stmt = $conn->prepare($query);
                $stmt->bind_param("i", $user_no);
                $stmt->execute();
                $stmt->bind_result($score);
                
                // Fetch the score
                if ($stmt->fetch()) {
					// Add the new amount to the current score
					$updated_score = $score;
					 $stmt->close();
				}
               

                // Check if score was fetched
                if ($score === 0) {
                    // Handle case when score is not available
                    $score = 0;
                }
					return '<a href="https://w22055173.nuwebspace.co.uk/KF7029/content/account.php" class="login">Logged In:  ' . $user_name . '</a> | <a href="https://w22055173.nuwebspace.co.uk/KF7029/content/game_logout.php" class="login">Log Out</a>
							<br>Points:  ' . $updated_score . '';
					
				} else {
					return '<a href="https://w22055173.nuwebspace.co.uk/KF7029/content/game_login.php" class="login">Log In</a> | <a href="https://w22055173.nuwebspace.co.uk/KF7029/content/game-register.php" class="login">Register</a>';
				}
			} else {
			return '<a href="https://w22055173.nuwebspace.co.uk/KF7029/content/game_login.php" class="login">Log In</a> | <a href="https://w22055173.nuwebspace.co.uk/KF7029/content/game-register.php" class="login">Register</a>';
			}
		} else {
			return '<a href="https://w22055173.nuwebspace.co.uk/KF7029/content/game_login.php" class="login">Log In</a> | <a href="https://w22055173.nuwebspace.co.uk/KF7029/content/game-register.php" class="login">Register</a>';
		}
	}
	
	function makeHeader(){
		$headContent = <<<HEAD

    <!--Header -->
    <section class="page-banner">
    <header>
        <!--Page Banner-->        
            <div class="grid-container-banner">
            <h1 class="grid-item-logo">
                <a href="game_index.php" class="logo">
                Quotify
                </a>
            </h1>
            <div class="grid-item-login">
HEAD;
    $headContent .= updateStatus();
    $headContent .= checkTimeout();
    $headContent .= <<<NAV
            </div>
            </div>
            
    </header>
    <nav>
    <ul>
        <li><a href="https://w22055173.nuwebspace.co.uk/KF7029/content/game_index.php" class="menu-style">Home</a></li>
        <li><a href="https://w22055173.nuwebspace.co.uk/KF7029/content/profile.php" class="menu-style">Profile</a></li>
        <li><a href="https://w22055173.nuwebspace.co.uk/KF7029/content/game-practice.php" class="menu-style">Learn</a></li>
        <li><a href="https://w22055173.nuwebspace.co.uk/KF7029/content/credits.php" class="menu-style">Credits</a></li>
    </ul>
    </nav>
    </section>   
    <div class="content-area">            
	<div></div>
NAV;
    return $headContent;
}
	

	function makeFooter() {
		$footContent = <<<FOOT
				
		<!-- Footer  -->
		</div>
		<footer>
			<h4 class="tagline"><a href="https://w22055173.nuwebspace.co.uk/KF7029/content/game_index.php" class="tagline">	Quotify </a></h4><br>
			<div class="page-footer">
				<div class="column">
				<h4 class="footer-title">Quotify</h4>
				<br>Hafsha Kabir
			    <br>Contact : 07443806766
				<br>Email : hafsha.kabir@northumbria.ac.uk
				<br>Website : <a href="https://w22055173.nuwebspace.co.uk/KF7029/content/game_index.php" class="footer-links">www.quotify.com</a>
				<br>
				<br>© 2023 Hafsha Kabir
				</div>
			</div>
		</footer>
		
	</body>
</html>
<div></div>
FOOT;
		return $footContent;
	}

	function makePageEnd() {
		return "</div>\n</body>\n</html>";
	}
	
	function displayAlert($message_head, $message_body, $link, $linkText) {
		echo "
		<h3 class=\"game-alert-heading\">$message_head</h3><br>
		$message_body
		<a href=\"$link\" class=\"game-button\">$linkText<br></a>";
		echo makePageEnd();
		die();
	}
	
	function addScore() {
		    
		    include('dbconn.php'); 
		if ($conn->connect_error) {
			die("Connection failed: " . $conn->connect_error);
		}
		if (array_key_exists('logged-in',$_SESSION)) {
			if ($_SESSION['logged-in']) {
				$user_no = isset($_SESSION['user_no']) ? $_SESSION['user_no'] : '';
				$score = isset($_SESSION['score']) ? $_SESSION['score'] : '';
				
				// Validate form data (basic example, you might want more validation)
				if (!isset($user_no) || !is_numeric($user_no) || !isset($score) || !is_numeric($score)) {
					echo "All fields are required.";
					exit;
				}
	
				// Prepare statement to fetch the current score
				$stmt = $conn->prepare("SELECT score FROM game_users WHERE user_no = ?");
				$stmt->bind_param("i", $user_no);
				$stmt->execute();
				$stmt->bind_result($current_score);
				if ($stmt->fetch()) {
					// Add the new amount to the current score
					$new_score = $current_score + 20;
	
					// Update the score in the database
					$stmt->close();
					$stmt = $conn->prepare("UPDATE game_users SET score = ? WHERE user_no = ?");
					$stmt->bind_param("ii", $new_score, $user_no);
					if ($stmt->execute()) {
						echo "20 points has been added";
					} else {
						throw new Exception("Error updating score: " . $stmt->error);
					}
				} else {
					echo "User not found.";
				}
				$stmt->close();
			} 
		}
	}
?>
<?php
function showScore() {
		include('dbconn.php'); 
		if ($conn->connect_error) {
			die("Connection failed: " . $conn->connect_error);
		}
		if (array_key_exists('logged-in',$_SESSION)) {
			if ($_SESSION['logged-in']) {
				if (isset($_SESSION['logged-in']) && $_SESSION['logged-in']) {
				$user_name = isset($_SESSION['user_name']) ? $_SESSION['user_name'] : '';
				$user_no = isset($_SESSION['user_no']) ? $_SESSION['user_no'] : '';
					$query = "SELECT score FROM game_users WHERE user_no = ?";
                $stmt = $conn->prepare($query);
                $stmt->bind_param("i", $user_no);
                $stmt->execute();
                $stmt->bind_result($score);
                
                // Fetch the score
                if ($stmt->fetch()) {
					// Add the new amount to the current score
					$updated_score = $score;
					 $stmt->close();
				}
               

                // Check if score was fetched
                if ($score === 0) {
                    // Handle case when score is not available
                    $score = 0;
                }
					return 'Your Points:  ' . $updated_score . '';
					
				} 
			}
		}
}		
	
	
	
?>
<?php
// Define the clean_input function
function clean_input($input) {
    // Trim leading and trailing spaces
    $input = trim($input);
    // Remove all spaces within the text
    $input = str_replace(' ', '', $input);
    return $input;
}
?>