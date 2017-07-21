<?php session_start();
include '../connection.php';

if(isset($_GET['offerid'])) {
	$query = "UPDATE tarjouspyynto SET status='HYLATTY' WHERE id='" . $_GET['offerid'] . "'";
	$result = mysqli_query($conn, $query);
	if(!$result)
		header('Location: ../main.php?error=offer_update_failed');
	else {
		header('Location: ../main.php?success=offer_updated');
	}
}

?>