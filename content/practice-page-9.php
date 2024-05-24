<?php
require_once('game_header_footer_func.php');
echo makePageStart("Practice- Book 8");
echo makeHeader();
?>

		<div class="content-area">     
		<!--Practice page book level 8 (practice)-->
		<section class="practice-form">
		<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
			<fieldset class="practice-page">
			
			<p>Formulate the complete Harvard reference for the book: </p>
			<p class="source-details">	
				
				<br>Title : Capitalism
				<br>Author(s): Gwen Stacy
				<br>Year of Publication: 2018
				<br>Place of Publication: Cardiff
				<br>Publisher: Marvel Enterprise
				<br>Editor(s): Andrew Park
				<br>Edition: Third UK edition
				
			</p><br>
				<div id="formGrid">
				<div class="input-container">
				<br>
					<input type="text" name="author" id="author" required>
					(2018) 
					 <i>Capitalism</i>. 
					 <input type="text" name="edition" id="edition" required>  
					<input type="text" name="edited_by" id="edited_by" required>  
					 Cardiff: 
					 Marvel Enterprise.
					
					<br>
					<span class="example"><span><i>Hint?</i></span><span class="examplehint">format :</h4> 
					Format :<br>Surname, Initial. (Year of publication) <i>Title</i>. Edition. Edited by Initial. Surname.  Place of publication: Publisher. 
					</span> </span>					
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
    //$year= 	clean_input($_POST['year_op'] ?? '';
    //$title= 	clean_input($_POST['title']?? '';
    $edition= 	clean_input($_POST['edition']   ?? '');
    //$place= 	clean_input($_POST['place_op'] ?? '';
	$edited_by= 	clean_input($_POST['edited_by']   ?? '');
    //$publisher= 	clean_input($_POST['publisher']?? '';
	//$page= 	clean_input($_POST['page'] ?? '');
	//$doi= 	clean_input($_POST['doi'] ?? '');
	//$access_date= 	clean_input($_POST['access_date'] ?? '');

    // Check each field individually
    if ($author !== "Stacy,G.") {
        $errors[] = "The input $author for Author is incorrect..";
    }
    //if ($year !== "2018") {
    //    $errors[] = "The input $year for Year of publication is incorrect.";
    //}
    //if ($title !== "Research Methods in Psychology") {
    //    $errors[] = "The input $title for Title is incorrect..";
    //}
    if ($edition !== "3rdUKedn.") {
        $errors[] = "The input $edition for edition is incorrect..";
    }
	if ($edited_by !== "EditedbyA.Park.") {
        $errors[] = "The input $edited_by for editor is incorrect";
    }
    //if ($place !== "Paris") {
    //    $errors[] = "The input $place for place of publication is incorrect.";
    //}
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
		echo "<br><br><br><br>Stacy, G. (2018). <i>Capitalism</i>. 3rd UK edn. Edited by A. Park. Cardiff: Marvel Enterprise.";
		echo "<br><br>";
		echo addScore();
		echo "<form action='https://w22055173.nuwebspace.co.uk/KF7029/content/practice-page-10.php' method='post'>";
		echo "<input type='submit' value='Next' class='submit-button'>";
		echo "</form>";
    }
    echo "</div>";
}
?>


<?php
echo  makePageEnd();
?>