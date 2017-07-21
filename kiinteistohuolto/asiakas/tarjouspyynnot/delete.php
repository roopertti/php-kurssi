<?php
session_start();
include '../connection.php';

if(isset($_GET['offerid'])) {
	if(!empty($_GET['offerid'])) {
		$checkIfExists = mysqli_query($conn, "SELECT * FROM tarjouspyynto WHERE id='" . $_GET['offerid'] . "' AND (status='JATETTY' OR status='HYVAKSYTTY' OR status='HYLATTY') AND asiakasId='" . $_SESSION['userid'] . "'");
		if(mysqli_num_rows($checkIfExists) == 0) {
			header("Location: ../main.php?warning=offer_not_found");
		} else {
			$result = mysqli_query($conn, "DELETE FROM tarjouspyynto WHERE id='" . $_GET['offerid'] . "'");
			if(!$result)
				header("Location: ../main.php?error=offer_delete_failed");
			else
				header("Location: ../main.php?success=offer_deleted");
		}
	}
}
?>