<?php
require_once('game_header_footer_func.php');
echo makePageStart("Practise -Quotify");
echo makeHeader();
include('dbconn.php'); 
echo "<div class='content-area'>";
	if (array_key_exists('logged-in',$_SESSION)) {
				if ($_SESSION['logged-in']) {
					if (isset($_SESSION['logged-in']) && $_SESSION['logged-in']) {
						include ('practice.php');
						exit;
					} 
				} else {
					$message_head = "Access Denied!!";
					$message_body = "You need to be logged in to access this page";
					$link = "https://w22055173.nuwebspace.co.uk/KF7029/content/game_login.php";
					$linkText = "Go to Login page";
					echo displayAlert($message_head, $message_body, $link, $linkText);
					}
	} else {
		$message_head = "Access Denied!!";
		$message_body = "You need to be logged in to access this page";
		$link = "https://w22055173.nuwebspace.co.uk/KF7029/content/game_login.php";
		$linkText = "Go to Login page";
		echo displayAlert($message_head, $message_body, $link, $linkText);

	}
	
echo "</div>";
echo  makePageEnd();
?>