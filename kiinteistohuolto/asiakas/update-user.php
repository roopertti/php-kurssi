<?php session_start();
include './connection.php';

$user = $pass = $passConfirm = $name = $email = $number = $address = "";
$orderAddress = $houseType = $houseArea = $propertyArea = "";

$missingFields = array();
$warning = "";

if(isset($_GET['id'])) {
	if(empty($_GET['id'])) {
		header('./main.php');
	} else {
		if($_SESSION['userid'] == $_GET['id']) {
			$query = "SELECT * FROM asiakas WHERE avain='".$_SESSION['userid']."'";
			$result = mysqli_query($conn, $query);
			if(mysqli_num_rows($result) == 0) {
				header('./authentication/login.php?error=session_closed');
			} else {
				$row = mysqli_fetch_assoc($result);
				$user = $row['tunnus'];
				$name = $row['nimi'];
				$address = $row['kaynti_osoite'];
				$orderAddress = $row['laskutus_osoite'];
				$number = $row['puhnro'];
				$email = $row['email'];
				$houseType = $row['asunnon_tyyppi'];
				$houseArea = $row['asunnon_pinta_ala'];
				$propertyArea = $row['tontin_pinta_ala'];
			}
		}
	}
}

if(isset($_POST['submit'])) {
	$missingCount = 0;
	if(empty($_POST['username'])) {
		$missingFields[$missingCount] = "käyttäjätunnus";
		$missingCount++;
	} else {
		$user = $_POST['username'];
	}
	if(empty($_POST['password'])) {
		$missingFields[$missingCount] = "salasana";
		$missingCount++;
	} else {
		$pass = $_POST['password'];
	}
	if(empty($_POST['password-confirm'])) {
		$missingFields[$missingCount] = "salasanan varmistus";
		$missingCount++;
	} else {
		$passConfirm = $_POST['password-confirm'];
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
	if(empty($_POST['phonenumber'])) {
		$missingFields[$missingCount] = "puhelinnumero";
		$missingCount++;
	} else {
		$number = $_POST['phonenumber'];
	}
	if(empty($_POST['address'])) {
		$missingFields[$missingCount] = "käyntiosoite";
		$missingCount++;
	} else {
		$address = $_POST['address'];
	}
	if(empty($_POST['billing-address'])) {
		$missingFields[$missingCount] = "tilausosoite";
		$missingCount++;
	} else {
		$orderAddress = $_POST['billing-address'];
	}
	if(empty($_POST['house-type'])) {
		$missingFields[$missingCount] = "asuntotyyppi";
		$missingCount++;
	} else {
		$houseType = $_POST['house-type'];
	}
	if(empty($_POST['house-area'])) {
		$missingFields[$missingCount] = "asunnon pinta-ala";
		$missingCount++;
	} else {
		$houseArea = $_POST['house-area'];
	}
	if(empty($_POST['property-area'])) {
		$missingFields[$missingCount] = "tontin pinta-ala";
		$missingCount++;
	} else {
		$propertyArea = $_POST['property-area'];
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
			$query = "UPDATE asiakas SET tunnus='".$user."',salasana='".$pass."',nimi='".$name."',kaynti_osoite='".$address."',";
			$query .= "laskutus_osoite='".$orderAddress."',puhnro=".$number.",email='".$email."',asunnon_tyyppi='".$houseType."',";
			$query .= "asunnon_pinta_ala='".$houseArea."',tontin_pinta_ala='".$propertyArea."' WHERE avain='".$_SESSION['userid']."'";
			
			$result = mysqli_query($conn, $query);
			if(!$result)
				echo "error with database connection!";
			else {
				$_SESSION['username'] = $user;
				$_SESSION['name'] = $name;
				header('Location: ./main.php?success=user_updated');
			}
		}
		else {
			$warning .= "<div class='alert alert-warning'><strong>Salasanat eivät täsmää.</strong>";
			$warning .= " Tarkista, että salasanat täsmäävät!</div>";
		}
	}
	
}
?>


<?php include 'header.php'; ?>

<div class="row">
	<div class="col-md-4"></div>
	<div class="col-md-4">
		<div class="well">
			<h3>Omien tietojen päivitys</h3>
			<?php echo $warning; ?>
			<form action="./update-user.php" method="post">
				<div class="row">
					<div class="col-md-6">
						<div class="form-group">
							<label>Käyttäjätunnus</label>
							<input type="text" name="username" value="<?php echo $user; ?>" class="form-control">
						</div>
					</div>
					<div class="col-md-6">
						<div class="form-group">
							<label>Salasana</label>
							<input type="text" name="password" class="form-control">
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-6">
					</div>
					<div class="col-md-6">
						<div class="form-group">
							<label>Salasana uudelleen</label>
							<input type="text" name="password-confirm" class="form-control">
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-6">
						<div class="form-group">
							<label>Nimi</label>
							<input type="text" name="name" value="<?php echo $name; ?>" class="form-control">
						</div>
					</div>
					<div class="col-md-6">
						<div class="form-group">
							<label>Käyntiosoite</label>
							<input type="text" name="address" value="<?php echo $address; ?>" class="form-control">
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-6">
						<div class="form-group">
							<label>Laskutusosoite</label>
							<input type="text" name="billing-address" value="<?php echo $orderAddress; ?>" class="form-control">
						</div>
					</div>
					<div class="col-md-6">
						<div class="form-group">
							<label>Puhelinnumero</label>
							<input type="text" name="phonenumber" value="<?php echo $number; ?>" class="form-control">
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-6">
						<div class="form-group">
							<label>Email</label>
							<input type="text" name="email" value="<?php echo $email; ?>" class="form-control">
						</div>
					</div>
					<div class="col-md-6">
						<div class="form-group">
							<label>Asunnon tyyppi</label>
							<input type="text" name="house-type" value="<?php echo $houseType; ?>" class="form-control">
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-6">
						<div class="form-group">
							<label>Asunnon pinta-ala</label>
							<input type="text" name="house-area" value="<?php echo $houseArea; ?>" class="form-control">
						</div>
					</div>
					<div class="col-md-6">
						<div class="form-group">
							<label>Tontin pinta-ala</label>
							<input type="text" name="property-area" value="<?php echo $propertyArea; ?>" class="form-control">
						</div>
					</div>
				</div>
				<div class="form-group">
					<a href="./main.php" class="btn btn-danger btn-lg">Takaisin</a>
					<input type="submit" name="submit" value="Päivitä tiedot" class="btn btn-info">
				</div>
			</form>
		</div>
	</div>
</div>

<?php include 'footer.php'; ?>