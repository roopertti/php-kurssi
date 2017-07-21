<?php include 'connection.php'?>

<div class="form-group">
	<label for="">Asiakastyyppi:</label>

	<?php

	$astyQuery = "SELECT avain, lyhenne, selite FROM asiakastyyppi";
	$asiakasTyypit = mysqli_query($connection, $astyQuery);

	if(mysqli_num_rows($asiakasTyypit) > 0) {

		echo "<select class='form-control' name='asty_avain'>";
		while($row = mysqli_fetch_assoc($asiakasTyypit)){
			echo "<option value=" . $row['avain'] . ">" . $row['selite'] . " (" . $row['lyhenne'] . ")</option>";
		}
		echo "</select>";
	}

	?>
</div>