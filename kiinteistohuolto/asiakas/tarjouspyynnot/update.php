<?php session_start();
include '../connection.php';
$priceEstimate = $description = $alert = $alertBox = "";
if(isset($_GET['offerid'])) {
	if(!empty($_GET['offerid'])) {
		$query = "SELECT * FROM tarjouspyynto WHERE id='" . $_GET['offerid'] . "'";
		$result = mysqli_query($conn, $query);
		if(mysqli_num_rows($result) != 0) {
			$row = mysqli_fetch_assoc($result);
			$priceEstimate = $row['kustannus_arvio'];
			$description = $row['kuvaus'];
			$id = $_GET['offerid'];
		}
	}
}

if(isset($_POST['submit'])) {
	if(empty($_POST['description'])) {
		$alert = "Kuvaus ei saa olla tyhjä!";
	} else {
		$query = "UPDATE tarjouspyynto SET kuvaus='".$_POST['description']."' WHERE id='".$_POST['id']."'";
		$result = mysqli_query($conn, $query);
		if(!$result)
			$alert = "Tarjouspyynnön päivittäminen tietokantaan epäonnistui." . mysqli_error($conn);
		else
			header('Location: ../main.php?success=offer_updated');
	}
}
?>


<?php include '../header.php'; ?>
<div class="row">
	<div class="col-md-4"></div>
	<div class="col-md-4">
		<?php
		if(!empty($alert)) {
			$alertBox .= "<div class='alert alert-danger'>";
			$alertBox .= $alert;
			$alertBox .= "</div>";
			echo $alertBox;
		}
		?>
		<h3>Muokkaa tarjouspyyntöä</h3>
		<div class="well">
			<form action="update.php" method="post">
				<div class="row">
					<div class="col-md-6">
						<div class="form-group">
							<label>Tilaaja</label>
							<p><?php echo $_SESSION['name']; ?></p>
						</div>
					</div>
					<input style="display: none;" type="text" name="id" value="<?php echo $id; ?>">
				</div>
				<div class="row">
					<div class="col-md-12">
						<label>Kuvaus työstä</label>
						<textarea name="description" cols="30" rows="5" class="form-control" maxlength="500"><?php echo $description; ?></textarea>
					</div>
				</div>
				<div class="form-group">
					<input type="submit" name="submit" class="btn btn-success" value="Tallenna">
					<a href="../main.php" class="btn btn-danger">Peruuta</a>
				</div>
			</form>
		</div>
	</div>
	<div class="col-md-4">
		<?php include '../personal-info.php'; ?>
	</div>
</div>
<?php include '../footer.php'; ?>