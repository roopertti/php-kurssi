<?php session_start();
include 'connection.php';

if(!isset($_SESSION['username'])) {
	header('Location: index.php?session_down=true');
}

$username = $_SESSION['username'];
$userid = $_SESSION['userid'];
$fetchUserInfo = mysqli_query($conn ,"SELECT nimi FROM asiakas WHERE tunnus='" . $username . "' AND avain='" . $userid . "'");
$name = "";
$row = mysqli_fetch_assoc($fetchUserInfo);
if(count($row) === 1) {
	$name = $row['nimi'];
	$_SESSION['name'] = $name;
} else {
	header('Location: index.php?user_not_found=true');
}

if($username !== $_SESSION['username']) {
	header('Location: index.php?session_down=true');
}?>