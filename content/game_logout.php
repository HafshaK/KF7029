<?php
session_start();

$_SESSION = array();

// Destroy the session
session_destroy();

header("Location: https://w22055173.nuwebspace.co.uk/KF7029/content/game_login.php"); 
exit;
?>
