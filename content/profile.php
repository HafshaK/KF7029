<?php
require_once('game_header_footer_func.php');
echo makePageStart("Practise -Quotify");
echo makeHeader();
include('dbconn.php'); 

if ($conn->connect_error) {
			die("Connection failed: " . $conn->connect_error);
		
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
				return 'User Name ' . $user_name . '
							<br>Points:  ' . $updated_score . '';
				}
			}
		}
}		

echo "</div></section>";
echo  makePageEnd();
?>