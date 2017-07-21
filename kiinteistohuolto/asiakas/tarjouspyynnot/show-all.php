<?php

$fetchOfferRequests = mysqli_query($conn, "SELECT * FROM tarjouspyynto WHERE asiakasId='" . $_SESSION['userid'] . "'");
$bodyEl = "";
if(mysqli_num_rows($fetchOfferRequests) == 0) {
	$bodyEl = "<h4>Ei näytettäviä tarjouspyyntöjä!</h4>";
} else {
	$bodyEl .= "<table class='table'><thead><th>Jätetty</th><th>Tila</th><th>Toiminnot</th></thead><tbody>";
	while($row = mysqli_fetch_assoc($fetchOfferRequests)) {
		$bodyEl .= "<tr><td>" . $row['jatetty'] . "</td>";
		$bodyEl .= "<td>" . $row['status'] . "</td>";
		if($row['status'] === "JATETTY") {
			$bodyEl .= "<td><div class='btn-group' role='group' aria-label='Basic example'>";
			$bodyEl .= "<a href='./tarjouspyynnot/show-one.php?offerid=" . $row['id'] . "' class='btn btn-info'>Tarkastele</a>";
			$bodyEl .= "<a href='./tarjouspyynnot/update.php?offerid=" . $row['id'] . "' class='btn btn-warning'>Muokkaa</a>";
			$bodyEl .= "<a href='./tarjouspyynnot/delete.php?offerid=" . $row['id'] . "' class='btn btn-danger'>Poista</a>";
			//$bodyEl .= "<button type='button' class='btn btn-secondary'>Muokkaa</button>";
			//$bodyEl .= "<button type='button' class='btn btn-secondary'>Poista</button>";
			$bodyEl .= "</div></td>";
		} else if($row['status'] === "VASTATTU") {
			$bodyEl .= "<td><div class='btn-group' role='group' aria-label='Basic example'>";
			$bodyEl .= "<a href='./tarjouspyynnot/show-one.php?offerid=" . $row['id'] . "' class='btn btn-info'>Tarkastele</a>";
			$bodyEl .= "<a href='./tyotilaukset/create-from-offer.php?offerid=" . $row['id'] . "' class='btn btn-success'>Hyväksy</a>";
			$bodyEl .= "<a href='./tarjouspyynnot/deny-offer.php?offerid=" . $row['id'] . "' class='btn btn-danger'>Hylkää</a>";
			//$bodyEl .= "<button type='button' class='btn btn-secondary'>Muokkaa</button>";
			//$bodyEl .= "<button type='button' class='btn btn-secondary'>Poista</button>";
			$bodyEl .= "</div></td>";
		} else {
			$bodyEl .= "<td><div class='btn-group' role='group' aria-label='Basic example'>";
			$bodyEl .= "<a href='./tarjouspyynnot/show-one.php?offerid=" . $row['id'] . "' class='btn btn-info'>Tarkastele</a>";
			$bodyEl .= "<a href='./tarjouspyynnot/delete.php?offerid=" . $row['id'] . "' class='btn btn-success'>Poista historiasta</a>";
			$bodyEl .= "</div></td>";
		}
		$bodyEl .= "</tr>";
	}
	$bodyEl .= "</tbody></table>";
}

?>
<h3>Omat tarjouspyynnöt</h3>
<div class="pre-scrollable" style="max-height: 300px;">
	<?php echo $bodyEl; ?>
</div>
