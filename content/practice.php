<?php


//Practice Menu

echo "<section class='game-form'><section class='practice-menu-container'>";
		
			echo "<h2 class='practice-menu-heading'>Practice Menu : </h2><br>";

            
				echo "<div class='practice-menu'>";
				$refType = array("Book", "Journal", "Conference", "Digitals", "Media and Art");
				$refUrl = array("lesson-book", "lesson-journal", "lesson-conference", "lesson-digitals", "lesson-media-art");


				$i=0;
					while ($i < count($refType)) {
						echo "<div class='menu-box'>
								<p><a href='https://w22055173.nuwebspace.co.uk/KF7029/content/{$refUrl[$i]}.php' class='game-button'>{$refType[$i]}</a></p>
								</div>";
							$i++;
					}
				
				echo "</div>";
				
				
			
		

echo "</div></section></section>";
?>