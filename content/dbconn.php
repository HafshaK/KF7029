<?php
	//connect to the database
	/* The following statements set up the 4 variables needed to connect to your account on the MySQL database on nuwebspace.*/

    $servername = 'nuwebspace_db';
    $username = 'w22055173';
    $password = 'London2579'; 
    $dbname = 'w22055173';
    $conn = mysqli_connect($servername, $username, $password, $dbname); 

    if ($conn->connect_error) {
        echo "<div class=\"red-alert\">";
        echo "<h2 class=\"red-alert-heading\">DB Error</h2><br>";
        echo "Please try again after some time";
        echo "<a href=\"https://w22055173.nuwebspace.co.uk/KF7013/content/contact.php\" class=\"more-url\">Click here</a> to report the error.<br>";
        echo "<a href=\"https://w22055173.nuwebspace.co.uk/KF7013/content/index.php\" class=\"submit-button-red\">Go to Home</a>";  
        die("Connection failed: " . $conn->connect_error);
    }
?>
