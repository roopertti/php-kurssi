<?php

include '../connection.php';

$user = $pass = $passConfirm = $name = $email = $number = $address = "";
$orderAddress = $houseType = $houseArea = $propertyArea = "";

$missingFields = array();
$warning = "";

if(isset($_POST['submit'])) {
	$missingCount = 0;
	if(empty($_POST['user'])) {
		$missingFields[$missingCount] = "käyttäjätunnus";
		$missingCount++;
	} else {
		$user = $_POST['user'];
	}
	if(empty($_POST['pass'])) {
		$missingFields[$missingCount] = "salasana";
		$missingCount++;
	} else {
		$pass = $_POST['pass'];
	}
	if(empty($_POST['passConfirm'])) {
		$missingFields[$missingCount] = "salasanan varmistus";
		$missingCount++;
	} else {
		$passConfirm = $_POST['passConfirm'];
	}
	if(empty($_POST['name'])) {
		$missingFields[$missingCount] = "nimi";
		$missingCount++;
	} else {
		$name = $_POST['name'];
	}
	if(empty($_POST['email'])) {
		$missingFields[$missingCount] = "sähköposti";
		$missingCount++;
	} else {
		$email = $_POST['email'];
	}
	if(empty($_POST['number'])) {
		$missingFields[$missingCount] = "puhelinnumero";
		$missingCount++;
	} else {
		$number = $_POST['number'];
	}
	if(empty($_POST['address'])) {
		$missingFields[$missingCount] = "käyntiosoite";
		$missingCount++;
	} else {
		$address = $_POST['address'];
	}
	if(empty($_POST['orderAddress'])) {
		$missingFields[$missingCount] = "tilausosoite";
		$missingCount++;
	} else {
		$orderAddress = $_POST['orderAddress'];
	}
	if(empty($_POST['houseType'])) {
		$missingFields[$missingCount] = "asuntotyyppi";
		$missingCount++;
	} else {
		$houseType = $_POST['houseType'];
	}
	if(empty($_POST['houseArea'])) {
		$missingFields[$missingCount] = "asunnon pinta-ala";
		$missingCount++;
	} else {
		$houseArea = $_POST['houseArea'];
	}
	if(empty($_POST['propertyArea'])) {
		$missingFields[$missingCount] = "tontin pinta-ala";
		$missingCount++;
	} else {
		$propertyArea = $_POST['propertyArea'];
	}
	
	if($missingCount !== 0) {
		$warning .= "<div class='alert alert-danger'><strong>Puutteelliset kentät.</strong>";
		$warning .= " Seuraavat kohdat puuttuivat: ";
		for($i = 0; $i < count($missingFields); $i++) {
			if($i === count($missingFields)-1)
				$warning .= $missingFields[$i] . ".";
			else  {
				$warning .= $missingFields[$i] . ", ";
			}
		}
		$warning .= "</div>";
	} else {
		if($pass === $passConfirm) {
			$query = "INSERT INTO asiakas(tunnus,salasana,nimi,kaynti_osoite,laskutus_osoite,puhnro,email,asunnon_tyyppi,asunnon_pinta_ala,tontin_pinta_ala) ";
			$query .= "VALUES('".$user."','".$pass."','".$name."','".$address."','".$orderAddress."','".$number."','".$email."','".$houseType."','".$houseArea."','".$propertyArea."')";
			
			$result = mysqli_query($conn, $query);
			if(!$result)
				echo "error with database connection!";
			else 
				header('Location: ../index.php?reg_status_successful=ok');
		}
		else {
			$warning .= "<div class='alert alert-warning'><strong>Salasanat eivät täsmää.</strong>";
			$warning .= " Tarkista, että salasanat täsmäävät!</div>";
		}
	}
	
}

?>
<?php include '../header.php'; ?>
<div class="row">
	<?php echo $warning; ?>
</div>
<div class="row">
	<div class="col-md-3"></div>
	<div class="col-md-6">
		<form action="register.php" method="post">
			<div class="row">
				<h4>Kirjautumistiedot</h4>
				<div class="col-md-6">
					<div class="form-group">
						<label for="">Käyttäjätunnus</label>
						<input type="text" name="user" class="form-control" maxlength="8" value="<?php echo $user; ?>">
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-md-6">
					<div class="form-group">
						<label for="">Salasana</label>
						<input type="password" name="pass" class="form-control" maxlength="8" value="<?php echo $pass; ?>">
					</div>
				</div>
				<div class="col-md-6">
					<div class="form-group">
						<label for="">Salasana uudelleen</label>
						<input type="password" name="passConfirm" class="form-control" maxlength="8" value="<?php echo $passConfirm; ?>">
					</div>
				</div>
			</div>
			<div class="row">
				<h4>Asiakkaan tiedot</h4>
				<div class="col-md-6">
					<div class="form-group">
						<label for="">Koko nimi</label>
						<input type="text" name="name" class="form-control" maxlength="20" value="<?php echo $name; ?>">
					</div>
				</div>
				<div class="col-md-6">
					<div class="form-group">
						<label for="">Sähköposti</label>
						<input type="text" name="email" class="form-control" maxlength="20" value="<?php echo $email; ?>">
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-md-6">
					<div class="form-group">
						<label for="">Puhelinnumero</label>
						<input type="text" name="number" class="form-control" maxlength="12" value="<?php echo $number; ?>">
					</div>
				</div>
				<div class="col-md-6">
					<div class="form-group">
						<label for="">Käyntiosoite</label>
						<input type="text" name="address" class="form-control" maxlength="20" value="<?php echo $address; ?>">
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-md-6">
					<div class="form-group">
						<label for="">Laskutusosoite</label>
						<input type="text" name="orderAddress" class="form-control" maxlength="20" value="<?php echo $orderAddress; ?>">
					</div>
				</div>
			</div>
			<div class="row">
				<h4>Asunnon tiedot</h4>
				<div class="col-md-4">
					<div class="form-group">
						<label for="">Asunnon tyyppi</label>
						<input type="text" name="houseType" class="form-control" maxlength="20" value="<?php echo $houseType; ?>">
					</div>
				</div>
				<div class="col-md-4">
					<div class="form-group">
						<label for="">Asunnon pinta-ala</label>
						<input type="text" name="houseArea" class="form-control" maxlength="10" value="<?php echo $houseArea; ?>">
					</div>
				</div>
				<div class="col-md-4">
					<div class="form-group">
						<label for="">Tontin pinta-ala</label>
						<input type="text" name="propertyArea" class="form-control" maxlength="10" value="<?php echo $propertyArea; ?>">
					</div>
				</div>
			</div>
			<div class="form-group text-center">
				<input type="submit" name="submit" value="Rekisteröidy!" class="btn btn-success btn-lg">
				<a href="../index.php" class="btn btn-danger">Peruuta</a>
			</div>
		</form>
	</div>
</div>

<?php include '../footer.php'; ?>