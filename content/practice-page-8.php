<?php
require_once('game_header_footer_func.php');
echo makePageStart("Practice- Book 8");
echo makeHeader();
?>

		<div class="content-area">     
		<!--Practice page book level 7 (e-book)-->
		<section class="practice-form">
		<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
			<fieldset class="practice-page">

			<p>Formulate the complete Harvard reference for this book : </p>
			<p class="source-details">	
	
				<br>Title: "The History of Art"
				<br>Author: Pearson Greene, Chelsea Norman
				<br>Year of publication: 1997
				<br>Publisher: Penguin
				<br>Place of publication: Paris
				<br>Edition: Revised 
				
			</p><br>
				<div id="formGrid">
				<div class="input-container">
				<br>
					<input type="text" name="author" id="author" required>
					 <i>The History of Art</i>. 
					 <input type="text" name="edition" id="edition" required>
					 <input type="text" id="place_op" name="place_op" required>:
					Penguin.
					
					<br>
					<span class="example"><span><i>Hint?</i></span><span class="examplehint">format :</h4> 
					<br>Surname, Initial. and Surname, Initial. (Year of publication) <i>Title</i>. Edition. Place of publication: Publisher.</span> </span>					
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

    $author = 		clean_input($_POST['author']    ?? '');
    //$year= 	clean_input($_POST['year_op']?? '';
    //$title= 	clean_input($_POST['title'] ?? '');
	$edition= 	clean_input($_POST['edition'] ?? '');
    $place= 	clean_input($_POST['place_op'] ?? '');
	//$edited_by= 	clean_input($_POST['edited_by'] ?? '');
    //$publisher= 	clean_input($_POST['publisher'] ?? '');
	//$page= 	clean_input($_POST['page'] ?? '');
	//$doi= 	clean_input($_POST['doi'] ?? '');
	//$access_date= 	clean_input($_POST['access_date'] ?? '');

    // Check each field individually
    if ($author !== "Greene,P.andNorman,C.(1997)") {
        $errors[] = "The input $author for Author is incorrect..";
    }
    //if ($year !== "1997") {
    //    $errors[] = "The input $year for Year of publication is incorrect.";
    //}
    //if ($title !== "Research Methods in Psychology") {
    //    $errors[] = "The input $title for for Titleis incorrect..";
    //}
    if ($edition !== "Rev.edn.") {
        $errors[] = "The input $edition for edition is incorrect..";
    }
	//if ($edited_by !== "Edited by") {
    //    $errors[] = "Incorrect input";
    //}
    if ($place !== "Paris") {
        $errors[] = "The input $place for place of publication is incorrect.";
    }
    //if ($publisher !== "Wiley") {
    //    $errors[] = "The input $publisher for publisher is incorrect.";
    //}
	//if ($page !== "120-145") {
    //    $errors[] = "Pages are incorrect.";
    //}
    //if ($doi !== "http://www.labyrinth.com/ebooks") {
    //    $errors[] = "DOI or URL is incorrect.";
    //}
	//if ($access_date !== "30 April 2024") {
    //    $errors[] = "The input $access_date for accessdate is incorrect.";
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
		echo "<a href='https://w22055173.nuwebspace.co.uk/KF7029/content/practice-page-9.php' class='game-button'>Skip to next lesson</a>";
        echo "</ul>";
    } else {
		
        echo "<p class='source-details'><br><br>Great! We have cited the book correctly";
		echo "<br><br>Greene, P. and Norman, C. (1997) The History of Art. Paris: Penguin. ";
		echo "<br><br>";
		echo "<br><br>Click Next to look for the next code.<br>";
		echo "<form action='https://w22055173.nuwebspace.co.uk/KF7029/content/practice-page-9.php' method='post'>";
		echo "<input type='submit' value='Next' class='submit-button'>";
		echo "</form>";
    }
    echo "</div>";
}
?>


<?php
echo  makePageEnd();
?>