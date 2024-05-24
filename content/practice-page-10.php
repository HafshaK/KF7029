<?php
require_once('game_header_footer_func.php');
echo makePageStart("Congrats");
echo makeHeader();
?>

		<div class="content-area">     
		<!--Tutorial  book level 4(basic)-->
		<section class="source-details">
		
			
			<br><h2>Congratulation!!!!!</h2>
			<p class="source-details">	
			<i>You have completed the first practice session</i>.<br><br>
				<?php
				echo  showScore();
				?>
			</p>
			
			<p><a href="https://w22055173.nuwebspace.co.uk/KF7029/content/game-quiz.php" class="game-button">Continue</a></p>
		</section>
		</div>


<?php
echo  makePageEnd();
?>