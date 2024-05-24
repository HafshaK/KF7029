<?php// Start or resume the session

// Set the inactivity timeout period (in seconds)
$inactive_timeout = 30; // 30 minutes

// Check if the session variable for the last activity timestamp is set
if (isset($_SESSION['last_activity'])) {
    // Calculate the time since the last activity
    $elapsed_time = time() - $_SESSION['last_activity'];

    // Check if the elapsed time exceeds the inactive timeout
    if ($elapsed_time > $inactive_timeout) {
        // Log the user out and destroy the session
        session_unset();
        session_destroy();

        // Redirect to the login page or another appropriate action
        header("Location: game_login.php");
        exit();
    }
}

// Update the last activity timestamp

?>