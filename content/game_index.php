<?php
require_once('game_header_footer_func.php');
echo makePageStart("Practise -Quotify");
echo makeHeader();
include('dbconn.php'); 
?>	
	<div class="content-area">     

		<!--Game Menu form-->
		<section class="game-form">
				<h1>Welcome to Quotify. </h1>
				<p>Your Ultimate Referencing Companion!!</p>
				<br>
				<p><a href="https://w22055173.nuwebspace.co.uk/KF7029/content/game-practice.php" class="game-button">Practice</a></p>
					<br>
				<p><a href="https://w22055173.nuwebspace.co.uk/KF7029/content/game-quiz.php" class="game-button">Quiz</a></p>
		</section>
	</div>
<?php
echo  makePageEnd();
?>