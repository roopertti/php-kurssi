<?php

$fetchOrders = mysqli_query($conn, "SELECT * FROM tilaus WHERE asiakasId='" . $_SESSION['userid'] . "'");
$bodyEl = "";
if(mysqli_num_rows($fetchOrders) == 0) {
	$bodyEl = "<h4>Ei näytettäviä työtilauksia!</h4>";
} else {
	$bodyEl .= "<table class='table'><thead><th>Tilattu</th><th>Tila</th><th>Toiminnot</th></thead><tbody>";
	while($row = mysqli_fetch_assoc($fetchOrders)) {
		$bodyEl .= "<tr><td>" . $row['tilattu'] . "</td>";
		$bodyEl .= "<td>" . $row['status'] . "</td>";
		if($row['status'] === "TILATTU") {
			$bodyEl .= "<td><div class='btn-group' role='group' aria-label='Basic example'>";
			$bodyEl .= "<a href='./tyotilaukset/show-one.php?orderid=" . $row['id'] . "' class='btn btn-info'>Tarkastele</a>";
			$bodyEl .= "<a href='./tyotilaukset/update.php?orderid=" . $row['id'] . "' class='btn btn-warning'>Muokkaa</a>";
			$bodyEl .= "<a href='./tyotilaukset/delete.php?orderid=" . $row['id'] . "' class='btn btn-danger'>Poista</a>";
			$bodyEl .= "</div></td>";
		} else if($row['status'] === "ALOITETTU") {
			$bodyEl .= "<td><div class='btn-group' role='group' aria-label='Basic example'>";
			$bodyEl .= "<a href='./tyotilaukset/show-one.php?orderid=" . $row['id'] . "' class='btn btn-info'>Tarkastele</a>";
			$bodyEl .= "</div></td>";
		} else if($row['status'] === "VALMIS") {
			$bodyEl .= "<td><div class='btn-group' role='group' aria-label='Basic example'>";
			$bodyEl .= "<a href='./tyotilaukset/accept-order.php?orderid=" . $row['id'] . "' class='btn btn-success'>Merkitse hyväksytyksi</a>";
			$bodyEl .= "</div></td>";
		} else {
			$bodyEl .= "<td><div class='btn-group' role='group' aria-label='Basic example'>";
			$bodyEl .= "<a href='./tyotilaukset/show-one.php?offerid=" . $row['id'] . "' class='btn btn-info'>Tarkastele</a>";
			$bodyEl .= "<a href='./tyotilaukset/delete.php?offerid=" . $row['id'] . "' class='btn btn-success'>Poista historiasta</a>";
			$bodyEl .= "</div></td>";
		}
		$bodyEl .= "</tr>";
	}
	$bodyEl .= "</tbody></table>";
}

?>
<h3>Työtilaukset</h3>
<div class="pre-scrollable" style="max-height: 300px;">
	<?php echo $bodyEl; ?>
</div>