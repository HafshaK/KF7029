<?php
require_once('game_header_footer_func.php');
echo makePageStart("Journal -Quotify");
echo makeHeader();
include('dbconn.php'); 
echo "<div class='content-area'>";
	if (array_key_exists('logged-in',$_SESSION)) {
				if ($_SESSION['logged-in']) {
					if (isset($_SESSION['logged-in']) && $_SESSION['logged-in']) {
						
						$score = isset($_SESSION['score']) ? $_SESSION['score'] : '';	
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
						if  ($updated_score > 100){
							include ('journal.php');
							exit;
						}
					} 
					}
				} else {
					$message_head = "Access Denied!!";
					$message_body = "You need 100 points to unlock";
					$link = "https://w22055173.nuwebspace.co.uk/KF7029/content/practice.php";
					$linkText = "Go to Login page";
					echo displayAlert($message_head, $message_body, $link, $linkText);
					}
	
echo "</div>";
echo  makePageEnd();
?>