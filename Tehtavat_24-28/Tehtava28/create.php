<?php include 'connection.php'; 

if(isset($_POST['submit'])) {
	$query = "INSERT INTO asiakas(nimi, osoite, postinro, postitmp, asty_avain) VALUES(";
	$query .= "'" . $_POST['nimi'] . "',";
	$query .= "'" . $_POST['osoite'] . "',";
	$query .= "'" . $_POST['postinro'] . "',";
	$query .= "'" . $_POST['postitmp'] . "',";
	$query .= "'" . $_POST['asty_avain'] . "'";
	$query .= ")";
	
	$result = mysqli_query($connection, $query);
	
	if(!$result) {
		echo "Tapahtui virhe: " . mysqli_error($connection);
	} else {
		header('Location: ' . "./index.php");
	}
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Tehtava28</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
</head>
<body>
	<div class="container">
		<h3>Luo uusi asiakas</h3>
		<form action="create.php" method="post">
			<div class="form-group">
				<label for="">Nimi</label>
				<input type="text" name="nimi" class="form-control">
			</div>
			<div class="form-group">
				<label for="">Osoite</label>
				<input type="text" name="osoite" class="form-control">
			</div>
			<div class="form-group">
				<label for="">Postinumero</label>
				<input type="text" name="postinro" class="form-control">
			</div>
			<div class="form-group">
				<label for="">Postitoimipaikka</label>
				<input type="text" name="postitmp" class="form-control">
			</div>
			<?php include 'astySelect.php'; ?>
			<div class="form-group">
				<input type="submit" name="submit" class="btn btn-success" value="Ok">
				<a href="./index.php" class="btn btn-warning">Peruuta</a>
			</div>
		</form>
	</div>
</body>
</html>