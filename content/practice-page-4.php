<?php
require_once('game_header_footer_func.php');
echo makePageStart("Practice- Book 4");
echo makeHeader();
?>

		<div class="content-area">     
		<!--Practice page book level 4 (practice)-->
		<section class="practice-form">
		<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
			<fieldset class="practice-page">
			
			<p>Formulate the complete Harvard reference for the book: </p>
			<p class="source-details">	
				
				<br>Title: "Advanced Mathematic"
				<br>Year of publication: 2016
				<br>Publisher: McGraw Hill
				<br>Place of publication:  Chicago
				<br>Edition: Second 
				
			</p><br>
				<div id="formGrid">
				<div class="input-container">
				<br>
					<input type="text" name="title" id="title" required>
					(2016). 
					 <input type="text" name="edition" id="edition" required>
					 <input type="text" id="place_op" name="place_op" required>:
					McGraw Hill.
					
					<br>
					<span class="example"><span><i>Hint?</i></span><span class="examplehint">
					Format :<br><i>Title</i> (Year of publication) Place of publication: Publisher. 
					<br>Eg. <i>Treasures of Britain and treasures of Ireland </i> (1990) London: Reader's Digest Association Ltd.
					</span>		
					</span>						
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
    $title= 	clean_input($_POST['title'] ?? '');
    $edition= 	clean_input($_POST['edition'] ?? '');
    $place= 	clean_input($_POST['place_op'] ?? '');
	//$edited_by= 	clean_input($_POST['edited_by'] ?? '');
    //$publisher= 	clean_input($_POST['publisher'] ?? '');
	//$page= 	clean_input($_POST['page'] ?? '');
	//$doi= 	clean_input($_POST['doi'] ?? '');
	//$access_date= 	clean_input($_POST['access_date'] ?? '');

    // Check each field individually
    //if ($author !== "Greene, P. and Norman, C.") {
    //    $errors[] = "The input $author for Author is incorrect..";
    //}
    //if ($year !== "1997") {
    //    $errors[] = "The input $year for Year of publication  is incorrect.";
    //}
    if ($title !== "AdvancedMathematic") {
        $errors[] = "The input $title for Title is incorrect..";
    }
    if ($edition !== "2ndedn.") {
        $errors[] = "The input $edition for edition is incorrect..";
    }
	//if ($edited_by !== "Edited by") {
    //    $errors[] = "Incorrect input";
    //}
    if ($place !== "Chicago") {
        $errors[] = "The input $place for place of publication is incorrect.";
    }
    //if ($publisher !== "Pearson Education") {
    //    $errors[] = "The input $publisher for publisher is incorrect.";
    //}
	//if ($page !== "120-145") {
    //    $errors[] = "Pages are incorrect.";
    //}
    //if ($doi !== "http://www.labyrinth.com/ebooks") {
    //    $errors[] = "DOI or URL is incorrect.";
    //}
	//if ($access_date !== "30 April 2024") {
    //    $errors[] = "Accessn date is incorrect.";
    //}
       

    // Display errors if any
    echo "<div id='result'>";
    if (!empty($errors)) {
        echo "<p>Incorrect fields:</p>";
        echo "<ul>";
        foreach ($errors as $error) {
            echo "<li>$error</li>";
        }
		echo "Please check you input or hint for the correct format. Ensure the proper order and punctuation are used";
		echo "<a href='https://w22055173.nuwebspace.co.uk/KF7029/content/lesson-book-5.php' class='game-button'>Skip to next lesson</a>";
        echo "</ul>";
    } else {
		
        echo "<p class='source-details'><br><br>Great! We have cited the book correctly";
		echo "<br><br><i>Advanced Mathematic</i> (1997). 2nd edn. Paris: Penguin.";
		echo "<br><br>";
		echo addScore();
		echo "<form action='https://w22055173.nuwebspace.co.uk/KF7029/content/lesson-book-5.php' method='post'>";
		echo "<input type='submit' value='Next' class='submit-button'>";
		echo "</form>";
    }
    echo "</div>";
}
?>


<?php
echo  makePageEnd();
?>