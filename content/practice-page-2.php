<?php
require_once('game_header_footer_func.php');
echo makePageStart("Practice - Book 2");
echo makeHeader();
?>

		<div class="content-area">     
		<!--Practice page book level 2(two author)-->
		<section class="practice-form">
		<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
			<fieldset class="practice-page">
			<p>Formulate the complete Harvard reference for the book: </p>
			<p class="source-details">	
				
				<br>Title: "Biodiversity and Climate Change: Transforming the Biosphere"
				<br>Author(s): Thomas Lovejoy and Hannah Lee
				<br>Publisher: Yale University Press
				<br>Place of publication: Germany
				<br>Edition: First
				<br>Year of publication: 2019
				</p><br>
				<div id="formGrid">
				<div class="input-container">
					<input type="text" name="author" id="author" required>
					(<input type="text" name="year_op" id="year_op"  required>) 
					 <i>Biodiversity and Climate Change Transforming the Biosphere</i>. 
					 <input type="text" id="place_op" name="place_op" required>:
					Yale University Press.
					
					<br>
					<span class="example"><span><i>Hint?</i></span><span class="examplehint">
					Format :<br>Surname, Initial., Surname, Initial. and Surname, Initial.(Year of publication) <i>Title</i>. Edition. Place of publication: Publisher. 
					<br>Eg. Dubois, P.-L., Jolibert, A. and Mühlbacher, H. (2007) Marketing management: a value creation process. Basingstoke: Palgrave Macmillan.
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

    $author = 		clean_input($_POST['author']    ?? '');
    $year = 		clean_input($_POST['year_op']   ?? '');
    //$title = 		clean_input($_POST['title']     ?? '');
    //$edition = 	clean_input(	$_POST['edition']?? '');
    $place = 		clean_input($_POST['place_op']  ?? '');
    //$publisher = 	clean_input($_POST['publisher'] ?? ''); 

    // Check each field individually
    if ($author !== "Lovejoy,T.andLee,H.") {
        $errors[] = "The input $author for Author is incorrect..";
    }
    if ($year !== "2019") {
        $errors[] = "The input $year for Year of publication  is incorrect.";
    }
    //if ($title !== "City of Dragons") {
    //    $errors[] = "The input $title for Title is incorrect..";
    //}
    //if ($edition !== "1st") {
    //    $errors[] = "Edition is incorrect.";
    //}
    if ($place !== "Germany") {
        $errors[] = "The input $place for place of publication is incorrect.";
    }
    //if ($publisher !== "x") {
    //    $errors[] = "The input $publisher for publisher is incorrect.";
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
		echo "<a href='https://w22055173.nuwebspace.co.uk/KF7029/content/lesson-book-3.php' class='game-button'>Skip to next lesson</a>";
        echo "</ul>";
    } else {
		
        echo "<p class='source-details'><br><br>Great! We have cited the book correctly";
		echo "<br><br>Lovejoy, T. and Hannah, L. (2019). Biodiversity and Climate Change Transforming the Biosphere. Germany: Yale University Press.";
		echo "<br><br>";
		echo addScore();
		echo "<br><br>";
		echo "<form action='https://w22055173.nuwebspace.co.uk/KF7029/content/lesson-book-3.php' method='post'>";
		echo "<input type='submit' value='Next' class='submit-button'>";
		echo "</form>";
    }
    echo "</div>";
}
?>


<?php
echo  makePageEnd();
?>