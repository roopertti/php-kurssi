<?php session_start();
include '../connection.php';
$description = $priceEstimate = $comment = $alert = $alertBox = "";
if(isset($_POST['submit'])) {
	if(!empty($_POST['description'])) {
		$description = $_POST['description'];
		$priceEstimate = $_POST['price-estimate'];
		$comment = $_POST['comment'];
		$created = date("Y-m-d H:i:s");
		$status = "TILATTU";
		$query = "INSERT INTO tyotarjous (tilaaja, kuvaus, jatetty, kustannus_arvio, status, asiakasId) ";
		$query .= "VALUES ('".$_SESSION['name']."','".$description."','".$created."','".$priceEstimate."','".$status."','".$_SESSION['userid']."')";
		$result = mysqli_query($conn, $query);
		if(!$result) {
			$alert = "Arvoa ei voitu lisätä tietokantaan." . mysqli_error($conn);
		} else {
			header('Location: ../main.php?success=offer_added');
		}
	} else
		$alert = "Tarjouspyyntöön on pakko sisällyttää kuvaus!";
}

if(!empty($alert)) {
	$alertBox .= "<div class='alert alert-danger'>";
	$alertBox .= $alert;
	$alertBox .= "</div>";
}

?>
<?php include '../header.php'?>
<div class="row">
	<div class="col-md-4"></div>
	<div class="col-md-4 text-center">
		<h3>Uusi työtarjous</h3>
		<?php echo $alertBox; ?>
		<div class="well">
			<form action="create.php" method="post">
				<div class="form-group">
					<div class="row">
						<div class="col-md-6">
							<label>Tilaaja</label>
							<p><?php echo $_SESSION['name']; ?></p>
						</div>
						<div class="col-md-6">
							<label>Kustannusarvio</label>
							<input type="text" name="price-estimate" class="form-control">
						</div>
					</div>
				</div>
				<div class="form-group">
					<div class="row">
						<div class="col-md-12">
							<label>Kuvaus työstä</label>
							<textarea name="description" cols="30" rows="5" maxlength="500" class="form-control"></textarea>
						</div>
					</div>
				</div>
				<div class="form-group">
					<div class="row">
						<div class="col-md-12">
							<label>Vapaa kommentti</label>
							<textarea name="comment" cols="30" rows="5" maxlength="500" class="form-control"></textarea>
						</div>
					</div>
				</div>
				<div class="form-group text-center">
					<input type="submit" name="submit" class="btn btn-success" value="Tee uusi työtarjous">
					<a href="../main.php" class="btn btn-danger">Peruuta</a>
				</div>
			</form>
		</div>
	</div>
	<div class="col-md-4">
		<?php include '../personal-info.php'; ?>
	</div>
</div>


<?php include '../footer.php'?>