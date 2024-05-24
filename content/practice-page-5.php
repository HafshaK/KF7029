<?php
require_once('game_header_footer_func.php');
echo makePageStart("Practice- Book 5");
echo makeHeader();
?>

		<div class="content-area">     
		<!--Practice page book level 5 (practice)-->
		<section class="practice-form">
		<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
			<fieldset class="practice-page">

			<p>Formulate the complete Harvard reference for the book: </p>
			<p class="source-details">	
				
				<br>Title: "The History of Ancient Ravka"
				<br>Publisher: Springer
				<br>Place of publication: Boston
				<br>Year of publication: 2006
				<br>Editor(s): Nikolai Lantsov and Inej Ghafa
				
			</p><br>
				<div id="formGrid">
				<div class="input-container">
				<br>
					<input type="text" name="edited_by" id="edited_by" required>. 
					(2006) 
					 <i>The History of Ancient Ravka</i>. 
					 <input type="text" id="place_op" name="place_op" required>:
					 Springer.
					
					<br>
					<span class="example"><span><i>Hint?</i></span><span class="examplehint">
					Format :<br>Surname, Initial. (ed.)(Year of publication) <i>Title</i>. Edition. Place of publication: Publisher. 
					<br> Eg. Pecht, M. and Kang, M. (eds.) (2018) <i>Prognostics and health management</i>. Hoboken, NJ: John Wiley & Sons.
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
    //$title= 	clean_input($_POST['title'] ?? '');
    //$edition= 	clean_input($_POST['edition'] ?? '');
    $place= 	clean_input($_POST['place_op'] ?? '');
	$edited_by= 	clean_input($_POST['edited_by'] ?? '');
    //$publisher= 	clean_input($_POST['publisher'] ?? '');
	//$page= 	clean_input($_POST['page'] ?? '');
	//$doi= 	clean_input($_POST['doi'] ?? '');
	//$access_date= 	clean_input($_POST['access_date'] ?? '');

    // Check each field individually
    //if ($author !== "Greene, P. and Norman, C.") {
    //    $errors[] = "The input $author for Author is incorrect..";
    //}
    //if ($year !== "2006") {
    //   $errors[] = "The input $year for Year of publication  is incorrect.";
    //}
    //if ($title !== "Research Methods in Psychology") {
    //    $errors[] = "The input $title for Title is incorrect..";
    //}
    //if ($edition !== "Rev. edn.") {
    //    $errors[] = "The input $edition for edition is incorrect..";
    //}
	if ($edited_by !== "Lantsov,N.andGhafa,I.(eds.)") {
        $errors[] = "Editor is incorrect";
    }
    if ($place !== "Boston") {
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
    echo "<div class='source-details'>";
    if (!empty($errors)) {
        echo "<p>Incorrect fields:</p>";
        echo "<ul>";
        foreach ($errors as $error) {
            echo "<li>$error</li>";
        }
		echo "Please check you input or hint for the correct format. Ensure the proper order and punctuation are used";
		echo "<a href='https://w22055173.nuwebspace.co.uk/KF7029/content/lesson-book-6.php' class='game-button'>Skip to next lesson</a>";
        echo "</ul>";
    } else {
		
        echo "<p class='source-details'><br><br>Great! We have cited the book correctly";
		echo "<br><br>Lantsov, N., and Ghafa, I. (eds.) (2006). Advancements in Neuroscience. Boston: Springer.";
		echo "<br><br>";
		echo "<br><br>Click Next to look for the next Chapter.<br>";
		echo "<form action='https://w22055173.nuwebspace.co.uk/KF7029/content/lesson-book-6.php' method='post'>";
		echo "<input type='submit' value='Next' class='submit-button'>";
		echo "</form>";
    }
    echo "</div>";
}
?>


<?php
echo  makePageEnd();
?>