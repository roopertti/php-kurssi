<?php

include 'connection.php';

if(isset($_POST)) {
	$query = "UPDATE asiakas SET nimi='" . $_POST['nimi']; 
	$query .= "', osoite='" . $_POST['osoite'];
	$query .= "', postinro='" . $_POST['postinro'];
	$query .= "', postitmp='" . $_POST['postitmp'];
	$query .= "', asty_avain='" . $_POST['asty_avain'] . "' WHERE avain='" . $_POST['avain'] . "'";
	
	$result = mysqli_query($connection, $query);
	
	if(!$result) {
		echo "Error: " . mysqli_error();
	} else {
		header('Location: ' . "./index.php");
	}
}

?>