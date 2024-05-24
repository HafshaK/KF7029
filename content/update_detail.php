<?php
require_once('dbconn.php'); // Include your database connection script

session_start();

// Check if the user is logged in
if (!isset($_SESSION['customerID'])) {
    // Redirect to login page or handle unauthorized access
    header("Location: login.php");
    exit();
}

$customerID = $_SESSION['customerID'];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Assuming form fields are 'current_password' and 'new_password'
    $current_password = $_POST['current_password'];
    $new_password = $_POST['new_password'];

    // Validate current password
    $query = "SELECT password_hash FROM customers WHERE customerID = ?";
    $stmt = mysqli_prepare($conn, $query);
    mysqli_stmt_bind_param($stmt, "i", $customerID);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    $row = mysqli_fetch_assoc($result);

    if ($row && password_verify($current_password, $row['password_hash'])) {
        // Current password is correct

        // Generate new salt (if using salt)
        $salt = bin2hex(random_bytes(8)); // Example salt generation

        // Hash the new password
        $password_hash = password_hash($new_password . $salt, PASSWORD_DEFAULT);

        // Update the password and salt in the database
        $update_query = "UPDATE customers SET password_hash = ?, salt = ? WHERE customerID = ?";
        $update_stmt = mysqli_prepare($conn, $update_query);
        mysqli_stmt_bind_param($update_stmt, "ssi", $password_hash, $salt, $customerID);
        mysqli_stmt_execute($update_stmt);

        // Redirect to a success page or show a success message
        header("Location: password_updated.php");
        exit();
    } else {
        // Current password is incorrect
        $error_message = "Current password is incorrect";
    }
}

// Include your header and form HTML here
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Password Update</title>
</head>
<body>

<?php
if (isset($error_message)) {
    echo "<p>Error: $error_message</p>";
}
?>

<!-- Password Update Form -->
<form action="" method="post">
    <label for="current_password">Current Password:</label>
    <input type="password" name="current_password" required><br>

    <label for="new_password">New Password:</label>
    <input type="password" name="new_password" required><br>

    <input type="submit" value="Update Password">
</form>

</body>
</html>
