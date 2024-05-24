<?php
require_once('game_header_footer_func.php');
echo makePageStart("Practice- Book 6");
echo makeHeader();
?>

		<div class="content-area">     
		<!--Practice page book level 6 (editor with author)-->
		<section class="practice-form">
		<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
			<fieldset class="practice-page">

			<p>Formulate the complete Harvard reference for the book: </p>
			<p class="source-details">	
				<br>Author(s): Primrose Everdeen, 
				<br>Year of publication: 2018
				<br>Title: "Advancements in Neuroscience"
				<br>Edition: Fifth
				<br>Place of publication: New York
				<br>Publisher: Springer
				<br>Editor(s): Christopher Bhangh,   Felix Lee
			</p><br>
				<div id="formGrid">
				<div class="input-container">
				<br>
					<input type="text" name="author" id="author" required>
					 <i>Advancements in Neuroscience. </i>
					5th edn.
					<input type="text" name="edited_by" id="edited_by" required> . 
					 New York: 
					 Springer.
					<br>
					<span class="example"><span><i>Hint?</i></span><span class="examplehint">
					Format :<br>Surname, Initial. (Year of publication) <i>Title</i>. Edition. Edited by Initial. Surname.  Place of publication: Publisher. 
					<br>Orksun, B. (2017) <i>Healthcare management.</i> 7th UK edn. Edited by B. Jones and D. Kirk. London: Medical Press Ltd.
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

    $author= 	clean_input($_POST['author'] ?? '');
    //$year= 	clean_input($_POST['year_op'] ?? '');
    //$title= 	clean_input($_POST['title'] ?? '');
    //$edition= 	clean_input($_POST['edition'] ?? '');
	$edited_by= 	clean_input($_POST['edited_by'] ?? '');
    //$place= 	clean_input($_POST['place_op'] ?? '');
    //$publisher= 	clean_input($_POST['publisher'] ?? '');
	//$page= 	clean_input($_POST['page'] ?? '');

    // Check each field individually
    if ($author !== "Everdeen,P.(2018)") {
        $errors[] = "The input $author for Author is incorrect..";
    }
    //if ($year !== "2018") {
    //    $errors[] = "The input $year for Year of publication  is incorrect.";
    //}
    //if ($title !== "Research Methods in Psychology") {
    //    $errors[] = "The input $title for Title is incorrect..";
    //}
    //if ($edition !== "5th") {
    //    $errors[] = "The input $edition for edition is incorrect..";
    //}
	if ($edited_by !== "EditedbyC.BhanghandF.Lee") {
        $errors[] = "The input $edited_by for editor is incorrect";
    }
    //if ($place !== "New York") {
    //    $errors[] = "The input $place for place of publication is incorrect.";
    //}
    //if ($publisher !== "Pearson Education") {
    //    $errors[] = "The input $publisher for publisher is incorrect.";
    //}
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
        echo "</ul>";
		echo "Please check you input or hint for the correct format. Ensure the proper order and punctuation are used";
		echo "<a href='https://w22055173.nuwebspace.co.uk/KF7029/content/lesson-book-7.php' class='game-button'>Skip to next lesson</a>";
    } else {
		
        echo "<p class='source-details'><br><br>Great! We have cited the book correctly";
		echo "<br><br>Everdeen, P. (2018). <i>Advancements in Neuroscience</i>. 5th edn. Edited by C. Bhangh and F. Lee New York: Springer.";
		echo addScore();
		echo "<br><br>";
		echo "<form action='https://w22055173.nuwebspace.co.uk/KF7029/content/lesson-book-7.php' method='post'>";
		echo "<input type='submit' value='Next' class='submit-button'>";
		echo "</form>";
    }
    echo "</div>";
}
?>


<?php
echo  makePageEnd();
?>