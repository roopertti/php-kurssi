<?php
$connection = mysqli_connect('localhost', 'root', '', 'asiakas');

if($connection) {
	echo "connected to mysql";
} else {
	die("connection failed");
}
?>

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

$astyQuery = "SELECT avain, lyhenne, selite FROM asiakastyyppi";
$asiakasTyypit = mysqli_query($connection, $astyQuery);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Tehtava 25</title>
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
					<div class="form-group">
						<label for="">Asiakastyyppi:</label>
						<?php
						
						if(mysqli_num_rows($asiakasTyypit) > 0) {
							
							echo "<select class='form-control' name='asty_avain'>";
							while($row = mysqli_fetch_assoc($asiakasTyypit)){
								echo "<option value=" . $row['avain'] . ">" . $row['selite'] . " (" . $row['lyhenne'] . ")</option>";
							}
							echo "</select>";
						}
						
						?>
					</div>
					<div class="form-group">
						<input type="submit" class="btn btn-info" name="submit" value="Suorita haku">
					</div>
				</form>
    		</div>
    		<div class="col-md-6">
    			<?php
				
				if($result !== null) {
					echo "<div class='well'>";
					echo "<table class='table'><thead><th>Avain</th><th>Nimi</th><th>Osoite</th><th>Postinumero</th><th>Asiakastyyppi</th>";
					echo "<tbody>";
					while($row = mysqli_fetch_row($result)) {
						echo "<tr>";
						foreach($row as $item) {
							$tableCell = "<td>" . $item . "</td>";
							echo $tableCell;
						}
						echo "<tr>";
					}
					echo "</tbody>";
					echo "</table>";
					echo "</div>";
				} else if($result === null) {
					echo "<h3>Suorita haku syöttämällä tiedot kenttään!</h3>";
				}
				?>
    		</div>
    	</div>
    	
    </div>
</body>
</html>