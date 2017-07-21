<?php include './authentication/check-session-validity.php'; ?>

<?php include 'header.php'; ?>

<div class="container">
	<div class="row">
		<div class="col-md-8">
			<?php
			$alert = "";
			if(isset($_GET['error'])) {
				$alert .= "<div class='alert alert-danger''>";
				if($_GET['error'] === "offer_delete_failed")
					$alert .= "Tarjouspyyntöä ei voitu poistaa! Varmista, että olit kirjautuneena sisään.";
				if($_GET['error'] === "offer_not_found")
					$alert .= "Tarjouspyyntöä ei löytynyt! Onko kyseinen pyyntö jo hyväksytty/hylätty?";
				if($_GET['error'] === "order_create_failed")
					$alert .= "Tilausta ei voitu tehdä! Tarkista, että tarjouspyyntö oli oikeanlainen.";
				if($_GET['error'] === "offer_update_failed")
					$alert .= "Tarjouspyyntöä ei voitu hylätä! Kokeile suoraan poistaa tarjouspyyntö.";
				$alert .= "</div>";
			}
			
			if(isset($_GET['warning'])) {
				$alert .= "<div class='alert alert-warning''>";
				if($_GET['warning'] === "offer_not_found")
					$alert .= "Tarjouspyyntöä ei löydetty! Se on todennäköisesti jo poistettu!";
				$alert .= "</div>";
			}
			
			if(isset($_GET['success'])) {
				$alert .= "<div class='alert alert-success''>";
				if($_GET['success'] === "offer_deleted")
					$alert .= "Tarjouspyyntö poistettiin onnistuneesti!";
				if($_GET['success'] === "offer_added")
					$alert .= "Tarjouspyyntö lisättiin onnistuneesti!";
				if($_GET['success'] === "offer_updated")
					$alert .= "Tarjouspyyntö päivitettiin onnistuneesti!";
				if($_GET['success'] === "user_updated")
					$alert .= "Käyttäjän tiedot onnistuneesti päivitetty!";
				if($_GET['success'] === "order_create_success")
					$alert .= "Tarjouspyyntö hyväksyttiin, uusi tilaus lisätty!";
				$alert .= "</div>";
			}
			
			?>
			<div class="row">
				<?php echo $alert; ?>
			</div>
			<div class="row">
				<?php include './tarjouspyynnot/show-all.php'; ?>
				<a href="./tarjouspyynnot/create.php" class="btn btn-success btn-lg">Jätä uusi tarjouspyyntö</a>
			</div>
			
			<div class="row">
				<?php include './tyotilaukset/show-all.php'?>
				<a href="./tyotilaukset/create.php" class="btn btn-success btn-lg">Tee uusi tilaus</a>
			<!--
				<h3>Työtilaukset</h3>
				<div class="pre-scrollable" style="max-height: 300px;">
					<table class="table">
						<thead>
							<th>Tilauspäivä</th>
							<th>Tila</th>
							<th>Toiminnot</th>
						</thead>
						<tbody>

						</tbody>
					</table>
				</div>
				<a href="" class="btn btn-success btn-lg">Tee uusi tilaus</a>
				-->
			</div>
			
		</div>
		<div class="col-md-4">
			<?php include './personal-info.php'; ?>
		</div>
	</div>
</div>

<?php include 'footer.php'; ?>