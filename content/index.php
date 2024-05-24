<?php
require_once('header_footer_func.php');
echo makePageStart("The Sound Dome - Home");
echo makeHeader();
?>

		<!-- Top Image  -->
		
		<section class="top-container">

			<img src="/KF7013/asset/images/img9_concert.jpg" alt="Concert Image" class="top-image">
			<div class="overlay-text">
				<h1 class="head-line">Welcome to the Sound Dome</h1>
				<h4 class="tagline" id="top-tag">Where Sound Echoes for Eternity.....</h4><br>
				<h2 class="para-line">Explore the Hottest Concerts in Seoul with us</h2>

				<p class="button-line"><a href="https://w22055173.nuwebspace.co.uk/KF7013/content/event-details.php" class="find-more">Find out more</a></p>
			</div>
		</section>
		<!--This section is for Upcomeing Event-->
	<main>
		<section class="upcoming-events-container">
		
			<h2 class="upcoming-events-heading">Upcoming Events : </h2>
<div class="grid-container-content">
            <?php
				echo "<div class='upcoming-events'>";
				// Connecting to the database
				include('dbconn.php'); 	
				$sql = "SELECT * FROM events";
				$stmt = $conn->prepare($sql);
				$stmt->execute();
				$result = $stmt->get_result();
				$eventCount = 0;

				// Collecting data from each row of the database
				if ($result->num_rows > 0) {
					while ($row = $result->fetch_assoc()) {
						echo "<article class='event-box'>
							<img src=".$row["event_imagepath"]." alt='Event Image" . $row["eventID"] . "' class='event-image'>
							<h3 class='event-name'>" . $row["event_title"] . "</h3>
							<p class='event-date'> " . $row["event_date"] . "<br>
							₩" . $row["price_per_person"] . "</p>
							<form action='https://w22055173.nuwebspace.co.uk/KF7013/content/event-details.php' method='post'>
								<input type='hidden' name='eventID' value='". $row["eventID"] . "'>
								<button type='submit' class='detail-link'>Click for more detail</button>
							</form>
							<form action='https://w22055173.nuwebspace.co.uk/KF7013/content/event-booking.php' method='post'>
								<input type='hidden' name='eventID' value='". $row["eventID"] . "'>
								<button type='submit' class='event-url'>Book Now &#187;</button>
							</form>
							</article>";
							$eventCount++;
							if ($eventCount >= 4) {
								break;
							}
					}
				} else {
					echo "No events found.";
				}
				$conn->close();
				echo "</div>";
				?>
				
				
			
			<p class="upcoming-events-url"><a href="https://w22055173.nuwebspace.co.uk/KF7013/content/-list.php" class="more-url">Find out more... </a></p>
			
		</section>
		<section class="trending-artist-container">
		
			<h2 class="upcoming-events-heading">Trendeing Artist : </h2>

            <?php
				echo "<div class='upcoming-events'>";
				// Connecting to the database
				include('dbconn.php'); 	
				$sql = "SELECT * FROM `artist` ORDER BY artist.artist_rank ASC";
				$stmt = $conn->prepare($sql);
				$stmt->execute();
				$result = $stmt->get_result();
				$artistCount = 0;

				// Collecting data from each row of the database
				if ($result->num_rows > 0) {
					while ($row = $result->fetch_assoc()) {
						echo "<article class='event-box'>
							<img src=".$row["artist_imagepath"]." alt='artist Image" . $row["artistID"] . "' class='artist-image'>
							<h3 class='event-name'>" . $row["artist_forename"] . "' '" . $row["artist_surname"] . "</h3>
							<p class='artist-desc'> " . $row["artist_description"] . "<br>
							<form action='https://w22055173.nuwebspace.co.uk/KF7013/content/artist-details.php' method='post'>
							<input type='hidden' name='artistID' value='". $row["artistID"] . "'>
								<button type='submit' class='detail-link'>Click for more detail</button>
							</form>
							</article>";
							$artistCount++;
							if ($artistCount >= 4) {
								break;
							}
					}
				} else {
					echo "No artist found.";
				}
				$conn->close();
				echo "</div>";
				?>
				
				
			
			<p class="upcoming-events-url"><a href="https://w22055173.nuwebspace.co.uk/KF7013/content/artist-list.php" class="more-url">Find out more... </a></p>
			
		</section>
		
	</main>
	

<?php
echo makeFooter();
?>