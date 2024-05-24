<?php
require_once('game_header_footer_func.php');
echo makePageStart("Practice- Book 7");
echo makeHeader();
?>

		<div class="content-area">     
		<!--Practice page book level 7 (e-book)-->
		<section class="practice-form">
		<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
			<fieldset class="practice-page">

			<p>Formulate the complete Harvard reference for this e-book : </p>
			<p class="source-details">	
	
				<br>Author(s): Sky Johnson, 
				<br>Year of publication: 2020
				<br>Title: Digital Marketing Strategies
				<br>Edition: Second
				<br>Publisher: Wiley
				<br>DOI: http://www.labyrinth.com/ebooks
				<br>Access date: April 30, 2024
			</p><br>
				<div id="formGrid">
				<div class="input-container">
				<br>
					Johnson, S. 
					(2020) 
					 <i>Digital Marketing Strategies. </i>
					<input type="text" name="edition" id="edition" required>  
					 <input type="text" id="doi" name="doi" required>
					 ( <input type="text" id="access_date" name="access_date" required> ).
					 
					<br>
					<span class="example"><span><i>Hint?</i></span><span class="examplehint">
					Format :<br>Surname, Initial. (Year of publication) <i>Title of book</i>. Edition. Available at: DOI or URL (Accessed: day month year).
					<br> Eg. Adams, D. (1979) <i>The hitchhiker's guide to the galaxy. </i>Available at: http://www.amazon.co.uk/kindle-ebooks(Accessed: 23 June 2021).
					</span>	</span>						
					<br>  
					
				</div>
					<input type="submit" value="Enter" class="submit-button">
				</div>
			</fieldset>
		</form>
		</section>
		</div>
		
 <?php

	if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $errors = array();

    //$author= 	clean_input($_POST['author'] ?? '');
    //$year= 	clean_input($_POST['year_op'] ?? '');
    //$title= 	clean_input($_POST['title'] ?? '');
    $edition= 	clean_input($_POST['edition'] ?? '');
    //$place= 	clean_input($_POST['place_op'] ?? '');
	//$edited_by= 	clean_input($_POST['edited_by'] ?? '');
    //$publisher= 	clean_input($_POST['publisher'] ?? '');
	//$page= 	clean_input($_POST['page'] ?? '');
	$doi= 	clean_input($_POST['doi'] ?? '');
	$access_date= 	clean_input($_POST['access_date'] ?? '');

    // Check each field individually
    //if ($author !== "Everdeen, P.") {
    //    $errors[] = "The input $author for Author is incorrect..";
    //}
    //if ($year !== "2020") {
    //    $errors[] = "The input $year for Year of publication is incorrect.";
    //}
    //if ($title !== "Research Methods in Psychology") {
    //    $errors[] = "The input $title for Title is incorrect..";
    //}
    if ($edition !== "2ndedn.") {
        $errors[] = "The input $edition for edition is incorrect..";
    }
	//if ($edited_by !== "Edited by") {
    //    $errors[] = "Incorrect input";
    //}
    //if ($place !== "New York") {
    //    $errors[] = "The input $place for place of publication is incorrect.";
    //}
    //if ($publisher !== "Wiley") {
    //    $errors[] = "The input $publisher for publisher is incorrect.";
    //}
	//if ($page !== "120-145") {
    //    $errors[] = "Pages are incorrect.";
    //}
    if ($doi !== "Availableat:http://www.labyrinth.com/ebooks") {
        $errors[] = "The input $doi for DOIor URL is incorrect.";
    }
	if ($access_date !== "Accessed:30April2024") {
        $errors[] = "The input $access_date for accessdate is incorrect.";
    }
       

    // Display errors if any
    echo "<div id='result'>";
    if (!empty($errors)) {
        echo "<p>Incorrect fields:</p>";
        echo "<ul>";
        foreach ($errors as $error) {
            echo "<li>$error</li>";
        }
		echo "Please check you input or hint for the correct format. Ensure the proper order and punctuation are used";
		echo "<a href='https://w22055173.nuwebspace.co.uk/KF7029/content/lesson-book-8.php' class='game-button'>Skip to next lesson</a>";
        echo "</ul>";
    } else {
		
        echo "<p class='source-details'><br><br>Great! We have cited the book correctly";
		echo "<br><br>";
		echo "<br><br>Click Next to look for the next Chapter.<br>";
		echo "<form action='https://w22055173.nuwebspace.co.uk/KF7029/content/lesson-book-8.php' method='post'>";
		echo "<input type='submit' value='Next' class='submit-button'>";
		echo "</form>";
    }
    echo "</div>";
}
?>


<?php
echo  makePageEnd();
?>