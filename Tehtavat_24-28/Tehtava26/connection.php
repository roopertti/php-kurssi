<?php
$connection = mysqli_connect('localhost', 'root', '', 'asiakas');

if($connection) {
	echo "connected to mysql";
} else {
	die("connection failed");
}
?>