<?php include 'connection.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Tehtava 27</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
</head>
<body>
	<div class="container">
		<?php
	
		if(isset($_GET['id'])) {
			$result = mysqli_query($connection, "SELECT nimi FROM asiakas WHERE avain='" . $_GET['id'] . "'");
			$row = mysqli_fetch_assoc($result);
			$deleteQuery = "DELETE FROM asiakas WHERE avain='" . $_GET['id'] . "'";
			$response = mysqli_query($connection, $deleteQuery);

			if($response === true) {
				if(empty($row['nimi'])) {
					echo "<h3>Virhe poistamisessa</h3><br>";
					echo "<p>Kohde on jo saatettu poistaa.</p>";
					echo "<a href='./index.php'>Jatka takaisin pääsivulle</a>";
				} else {
					echo "<h3>Poistettiin " . $row['nimi'] . "</h3><br>";
					echo "<a href='./index.php'>Jatka takaisin pääsivulle</a>";
				}
			}
		}
		?>
	</div>
</body>
</html>