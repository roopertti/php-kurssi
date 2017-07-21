<?php session_start();
include '../connection.php';

if(isset($_GET['offerid'])) {
	$query = "SELECT * FROM tarjouspyynto WHERE id='" . $_GET['offerid'] . "'";
	$result = mysqli_query($conn, $query);
	if(mysqli_num_rows($result) == 0) {
		header('Location: ../main.php?error=offer_not_found');
	} else {
		$row = mysqli_fetch_assoc($result);
		$name = $_SESSION['name'];
		$description = $row['kuvaus'];
		$priceEstimate = $row['kustannus_arvio'];
		$ordered = date("Y-m-d H:i:s");
		$status = "TILATTU";
		$customerId = $_SESSION['userid'];
		$query = "INSERT INTO tilaus(tilaaja, kuvaus, tilattu, kustannus_arvio, status, asiakasId) ";
		$query .= "VALUES('".$name."','".$description."','".$ordered."','".$priceEstimate."','".$status."','".$customerId."')";
		$result = mysqli_query($conn, $query);
		if(!$result)
			header('Location: ../main.php?error=order_create_failed');
		else {
			$query = "UPDATE tarjouspyynto SET status='HYVAKSYTTY' WHERE id='" . $_GET['offerid'] . "'";
			$result =  mysqli_query($conn, $query);
			if(!$result)
				header('Location: ../main.php?error=order_create_failed');
			else
				header('Location: ../main.php?success=order_create_success');
		}
	}
}

?>