<?php session_start();
include 'connection.php';
$warning = "";

if(isset($_GET['error'])) {
	$warning .= "<div class='alert alert-danger'>";
	$warning .= "Sessio vanhentui, kirjaudu uudestaan</div>";
}

if(isset($_POST['submit'])) {
	if(empty($_POST['user']) || empty($_POST['pass'])) {
		$warning .= "<div class='alert alert-danger'><strong>Puutteelliset tiedot. </strong>";
		$warning .= "Tarkista, että syötit käyttäjätunnuksen ja salasanan.</div>";
	} else {
		$username = $_POST['user'];
		$password = $_POST['pass'];
		//$username = stripslashes($username);
		//$password = stripslashes($password);
		//$username = mysql_real_escape_string($username);
		//$password = mysql_real_escape_string($password);
		$query = "SELECT avain FROM asiakas WHERE tunnus='" . $username . "' AND salasana='" . $password . "'";
		$result = mysqli_query($conn, $query);
		
		if(!$result) {
			echo "error with database connection";
		} else {
			$row = mysqli_fetch_assoc($result);
			if(count($row) === 1) {
				$_SESSION['username'] = $username;
				$_SESSION['userid'] = $row['avain'];
				header('location: main.php');
			}
			else {
				$warning .= "<div class='alert alert-danger'><strong>Virheellinen kirjautuminen. </strong>";
				$warning .= "Tarkista, että syötit käyttäjätunnuksen ja salasanan oikein.</div>";
			}
		}
	}
}?>


