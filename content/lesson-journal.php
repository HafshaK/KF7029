<?php
require_once('game_header_footer_func.php');

echo makePageStart("Journal - Quotify");
echo makeHeader();
include('dbconn.php');

echo "<div class='content-area'>";

// Check if the user is logged in
if (array_key_exists('logged-in', $_SESSION) && $_SESSION['logged-in']) {
    $user_no = isset($_SESSION['user_no']) ? $_SESSION['user_no'] : null;

    if ($user_no) {
        $query = "SELECT score FROM game_users WHERE user_no = ?";
        if ($stmt = $conn->prepare($query)) {
            $stmt->bind_param("i", $user_no);
            $stmt->execute();
            $stmt->bind_result($score);

            // Fetch the score
            if ($stmt->fetch()) {
                $updated_score = $score;
                $stmt->close();
                
                echo "<p>Current Score  is $updated_score</p>";
                
                // Check if the score is greater than 100
                if ($updated_score > 100) {
                    echo "<p> </p>";
                    include('journal.php');
                    exit;
                } else {
                    
                    $message_head = "Access Denied!!";
                    $message_body = "You need 100 points to unlock";
                    $link = "https://w22055173.nuwebspace.co.uk/KF7029/content/practice.php";
                    $linkText = "Go to Login page";
                    echo displayAlert($message_head, $message_body, $link, $linkText);
                }
            } else {
                echo "<p>Debug: Failed to fetch score.</p>";
            }
        } else {
            echo "<p>Debug: Failed to prepare statement.</p>";
        }
    } else {
        echo "<p>Debug: User number is not set in the session.</p>";
    }
} else {
    $message_head = "Access Denied!!";
    $message_body = "You need 100 points to unlock";
    $link = "https://w22055173.nuwebspace.co.uk/KF7029/content/practice.php";
    $linkText = "Go to Login page";
    echo displayAlert($message_head, $message_body, $link, $linkText);
}

echo "</div>";
echo makePageEnd();
?>
