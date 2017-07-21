<?php
include 'connection.php';

if(isset($_GET['id'])) {
	$nimi = $osoite = $postinro = $postitmp = "";
	$avain = $_GET['id'];
	$result = mysqli_query($connection, "SELECT nimi, osoite, postinro, postitmp FROM asiakas WHERE avain='" . $_GET['id'] . "'");
	
	while($row = mysqli_fetch_assoc($result)){
		$nimi = $row['nimi'];
		$osoite = $row['osoite'];
		$postinro = $row['postinro'];
		$postitmp = $row['postitmp'];
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
		<form action="handleUpdatePost.php" method="post">
			<input type="hidden" name="avain" value="<?php echo $avain; ?>">
			<div class="form-group">
				<label for="">Nimi</label>
				<input type="text" name="nimi" class="form-control" value="<?php echo $nimi; ?>">
			</div>
			<div class="form-group">
				<label for="">Osoite</label>
				<input type="text" name="osoite" class="form-control" value="<?php echo $osoite; ?>">
			</div>
			<div class="form-group">
				<label for="">Postinumero</label>
				<input type="text" name="postinro" class="form-control" value="<?php echo $postinro; ?>">
			</div>
			<div class="form-group">
				<label for="">Postitoimipaikka</label>
				<input type="text" name="postitmp" class="form-control" value="<?php echo $postitmp; ?>">
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