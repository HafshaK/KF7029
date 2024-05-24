<?php
require_once('game_header_footer_func.php');
echo makePageStart("Practice- Book 3");
echo makeHeader();
?>

		<div class="content-area">     
		<!--Practice page book level 3 (3+ author)-->
		<section class="practice-form">
		<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
			<fieldset class="practice-page">
			<p>Formulate the complete Harvard reference for the book: </p>
			<p class="source-details">	
				<br>Title: "Research Methods in Psychology"
				<br>Edition: First
				<br>Publisher: Pearson Education
				<br>Place of publication: New York
				<br>Author(s): Smith, J., Johnson, A., Williams, R., Brown, M., & Lee, S.
				<br>Year of publication: 2018
			</p><br>
				<div id="formGrid">
				<div class="input-container">
					<input type="text" name="author" id="author" required>
					(2018) 
					 <input type="text" name="title" id="title"  required>
					 New York:
					<input type="text" id="publisher" name="publisher" required>
					<br>
					<span class="example"><span><i>Hint?</i></span><span class="examplehint">
					Format :<br>Surname, Initial.  <i>et al.</i> (Year of publication) <i>Title</i>. Edition. Place of publication: Publisher. 
					<br>Eg. Petit, V. et al. (2020)<i> The anthropological demography of health</i>. Oxford: Oxford University Press.</span>
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

    $author= 	clean_input($_POST['author'] ?? '');
    //$year= 	clean_input($_POST['year_op'] ?? '');
    $title= 	clean_input($_POST['title'] ?? '');
    //$edition= 	clean_input($_POST['edition'] ?? '');
    //$place= 	clean_input($_POST['place_op'] ?? '');
    $publisher= 	clean_input($_POST['publisher'] ?? '');
	//$page= 	clean_input($_POST['page'] ?? '');

    // Check each field individually
    if ($author !== "Smith,J.etal.") {
        $errors[] = "The input $author for Author is incorrect. Eg. Surname, Initial. et al.";
    }
    //if ($year !== "2019") {
    //    $errors[] = "The input $year for Year of publication  is incorrect.";
    //}
    if ($title !== "ResearchMethodsinPsychology") {
        $errors[] = "The input $title for Title is incorrect. ";
    }
    //if ($edition !== "1st") {
    //    $errors[] = "The input $edition for edition is incorrect..";
    //}
    //if ($place !== "Germany") {
    //    $errors[] = "The input $place for place of publication is incorrect.";
    //}
    if ($publisher !== "PearsonEducation") {
        $errors[] = "The input $publisher for Publisher is incorrect. ";
    }
	//if ($page !== "120-145") {
    //    $errors[] = "Pages are incorrect.";
    //}
    

    // Display errors if any
    echo "<div class='source-details'>";
    if (!empty($errors)) {
        echo "<p>Incorrect fields:</p>";
        echo "<ul>";
        foreach ($errors as $error) {
            echo "<li>$error</li>";
        }
		echo "Please check you input or hint for the correct format. Ensure the proper order and punctuation are used";
		echo "<a href='https://w22055173.nuwebspace.co.uk/KF7029/content/lesson-book-4.php' class='game-button'>Skip to next lesson</a>";
        echo "</ul>";
    } else {
		
        echo "<p class='source-details'><br><br>Great! We have cited the book correctly";
		echo "<br><br>Smith, J. et al. (2018). Research Methods in Psychology. New York: Pearson Education.";
		echo "<br><br>";
		echo addScore();
		echo "<a href='https://w22055173.nuwebspace.co.uk/KF7029/content/lesson-book-4.php' class='game-button'>Next</a>";
    }
    echo "</div>";
}
?>


<?php
echo  makePageEnd();
?>