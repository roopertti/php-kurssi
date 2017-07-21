<?php session_start();
include '../connection.php';
$tilaaja = $kuvaus = $jatetty = $vastattu = $kustannusarvio = $tila = "";
if(isset($_GET['offerid'])) {
	if(!empty($_GET['offerid'])) {
		$query = "SELECT * FROM tarjouspyynto WHERE id='" . $_GET['offerid'] . "'";
		$result = mysqli_query($conn, $query);
		
		if(mysqli_num_rows($result) != 0) {
			$row = mysqli_fetch_assoc($result);
			$tilaaja = $row['tilaaja'];
			$kuvaus = $row['kuvaus'];
			$jatettu = $row['jatetty'];
			$kustannusarvio = $row['kustannus_arvio'];
			$vastattu = $row['vastattu'];
			$tila = $row['status'];
		}
	}
}
?>

<?php include '../header.php'; ?>

<div class="row">
	<div class="col-md-4"></div>
	<div class="col-md-4">
		<h3>Tarjouspyyntö</h3>
		<div class="well">
			<p><strong>Tilaaja: </strong><?php echo $tilaaja; ?></p>
			<p><strong>Kuvaus: </strong><?php echo $kuvaus; ?></p>
			<p><strong>Jätetty: </strong><?php echo $jatettu; ?></p>
			<p><strong>Kustannusarvio: </strong><?php echo $kustannusarvio; ?></p>
			<p><strong>Vastattu: </strong><?php echo $vastattu; ?></p>
			<p><strong>Tila: </strong><?php echo $tila; ?></p>
			<a href="../main.php" class="btn btn-danger btn-lg">Takaisin</a>
		</div>
	</div>
	<div class="col-md-4">
		<?php include '../personal-info.php'; ?>
	</div>
</div>

<?php include '../footer.php'; ?>