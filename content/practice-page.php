<?php

require_once('game_header_footer_func.php');
echo makePageStart("Practice- Book 1");
echo makeHeader();

?>

		<div class="content-area">     
		<!--Practice page book level 1(basic)-->
		<section class="practice-form">
		<form id="question" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
			<fieldset class="practice-page">
			<p>Your first task is to track down the below book in the library.</p>
			<p class="source-details">	
				<br>Title: "City of Dragons"
				<br>Author(s): Robin Hobb
				<br>Publisher: Harper Voyager
				<br>Place of publication: London
				<br>Year of publication: 2012
				<br>Edition: Third
							
			</p><br>
				<div id="formGrid">
				<div class="input-container">
					<input type="text" name="author" id="author" placeholder="Author Name" required>
					(<input type="text" name="year_op" id="year_op" placeholder="Publication year" required>) 
					 <input type="text" name="title" id="title" class="title" placeholder="Book Title" required>. 
					<input type="text" name="edition" id="edition" placeholder="Edition" required> edn.
					 <input type="text" id="place_op" name="place_op" placeholder="Publication place"required>:
					<input type="text" id="publisher" name="publisher" placeholder="Publisher" required>.
					<br>
					<span class="example"><span><i>Hint?</i></span><span class="examplehint">
					Format :<br>Surname, Initial. (Year of publication) <i>Title</i>. Edition. Place of publication: Publisher. 
					<br>Eg. Cottrell, S. (2019)<i>The study skills handbook.</i> 5th edn. London: Red Globe Press.                 
					</span>
					</span>					
					<br>


					
				</div>
					<input type="submit" id="submitButton" value="Enter" class="submit-button">
				</div>
			</fieldset>
		</form>
		
		</section>
		</div>
		     

<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
	
    $errors = array();

    $author = 		clean_input($_POST['author']    ?? '');
    $year = 		clean_input($_POST['year_op']   ?? '');
    $title =		clean_input($_POST['title']     ?? '');
    $edition =		clean_input($_POST['edition']   ?? '');
    $place =		clean_input($_POST['place_op']  ?? '');
    $publisher = 	clean_input($_POST['publisher'] ?? '');

    // Check each field individually
    if ($author !== "Hobb,R.") {
        $errors[] = "The input $author for Author is incorrect..";
    }
    if ($year !== "2012") {
        $errors[] = "The input $year for Year of publication  is incorrect.";
    }
    if ($title !== "CityofDragons") {
        $errors[] = "The input $title for Title is incorrect.";
    }
    if ($edition !== "3rd") {
        $errors[] = "The input $edition for edition is incorrect..";
    }
    if ($place !== "London") {
        $errors[] = "The input $place for place of publication is incorrect.";
    }
    if ($publisher !== "HarperVoyager") {
        $errors[] = "The input $publisher for publisher is incorrect.";
    }

    // Display errors if any
    echo "<div class='source-details'>";
    if (!empty($errors)) {
        echo "<p>Incorrect fields:</p>";
        echo "<ul>";
        foreach ($errors as $error) {
            echo "<li>$error</li>";
        }
		echo "Please check you input or hint for the correct format. Ensure the proper order and punctuation are used";
		echo "<a href='https://w22055173.nuwebspace.co.uk/KF7029/content/lesson-book-2.php' class='game-button'>Skip to next lesson</a>";
        echo "</ul>";
    } else {
		
		
        echo "<p class='source-details'><br><br>Great! We have cited the book correctly";
		echo "<br><br>Hobb, R. (2012). <i>City of Dragons</i>. 3rd ed.. London: Harper Voyager.";
		echo "<br><br>";
		echo addScore();
		echo "<br><br>";
		echo "<form action='https://w22055173.nuwebspace.co.uk/KF7029/content/lesson-book-2.php' method='post'>";
		echo "<input type='submit' value='Next' class='submit-button'>";
		echo "</form>";
			}
    echo "</div>";
}


?>

<?php
echo  makePageEnd();
?>