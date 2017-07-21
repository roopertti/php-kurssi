<?php include 'connection.php'; ?>

<?php

$result = null;

if(isset($_POST['submit'])) {
	$hakuehdot = array();
	
	if(!empty($_POST['nimi'])) {
		$hakuehdot['nimi'] = $_POST['nimi'];
	}
	if(!empty($_POST['osoite'])) {
		$hakuehdot['osoite'] = $_POST['osoite'];
	}
	if(!empty($_POST['postinro'])) {
		$hakuehdot['postinro'] = $_POST['postinro'];
	}
	$hakuehdot['asty_avain'] = $_POST['asty_avain'];
	
	if(count($hakuehdot) > 0) {
		$query = "SELECT avain, nimi, osoite, postinro, asty_avain FROM asiakas WHERE ";
		$counter = count($hakuehdot);
		
		foreach($hakuehdot as $key => $value) {
			$query .= $key . " = '" . $value . "'";
			$counter--;
			if($counter > 0) {
				$query .= " AND ";
			}
		}
	} else {
		$query = "SELECT avain, nimi, osoite, postinro, asty_avain FROM asiakas";
	}
	
	$result = mysqli_query($connection, $query);
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Tehtava 27</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
</head>
<body>
    <div class="container">
    	<div class="row">
    		<div class="col-md-6">
    			<form action="index.php" method="post">
					<div class="form-group">
						<label for="">Nimi</label>
						<input type="text" class="form-control" name="nimi">
					</div>
					<div class="form-group">
						<label for="">Osoite</label>
						<input type="text" class="form-control" name="osoite">
					</div>
					<div class="form-group">
						<label for="">Postinumero</label>
						<input type="text" class="form-control" name="postinro">
					</div>
					
					<?php include 'astySelect.php'?>
					
					<div class="form-group">
						<input type="submit" class="btn btn-info" name="submit" value="Suorita haku">
					</div>
				</form>
    		</div>
    		<div class="col-md-6">
    			<?php
				
				if($result !== null) {
					echo "<div class='well'>";
					echo "<table class='table'><thead><th>Avain</th><th>Nimi</th><th>Osoite</th><th>Postinumero</th><th>AsTy</th><th>Delete</th>";
					echo "<tbody>";
					while($row = mysqli_fetch_assoc($result)) {
						echo "<tr>";
						foreach($row as $item) {
							$tableCell = "<td>" . $item . "</td>";
							echo $tableCell;
						}
						echo "<td><a href='./delete.php?id=" . $row['avain'] . "'>Poista</a></td>";
						echo "<tr>";
					}
					echo "</tbody>";
					echo "</table>";
					echo "</div>";
				} else if($result === null) {
					echo "<h3>Suorita haku syöttämällä tiedot kenttään!</h3>";
				}
				?>
   				<a href="./create.php" class="btn btn-success">Luo uusi asiakas!</a>
    		</div>
    	</div>
    	
    </div>
</body>
</html>