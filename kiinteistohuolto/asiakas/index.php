<?php include './authentication/login.php'; ?>

<?php include 'header.php'; ?>

<?php
$notification = "";

if(isset($_GET['reg_status_successful'])) {
	if($_GET['reg_status_successful'] === "ok") {
		$notification = "<div class='alert alert-success'><strong>Rekisteröinti onnistui!</strong>";
		$notification .= " Kirjaudu nyt sisään uusilla tunnuksilla.</div>";
	}
}

if(isset($_GET['session_down'])) {
	if($_GET['session_down'] === "true") {
		$notification = "<div class='alert alert-warning'><strong>Sessio alhaalla</strong>";
		$notification .= " Sessio ei ole enää voimassa, kirjaudu uudestaan.</div>";
	}
}

if(isset($_GET['user_not_found'])) {
	if($_GET['user_not_found'] === "true") {
		$notification = "<div class='alert alert-warning'><strong>Käyttäjää ei tunnistettu</strong>";
		$notification .= " Käyttäjätiliä ei tunnistettu. Olethan rekisteröitynyt?</div>";
	}
}

?>
<div class="row">
	<div class="col-md-4"></div>
	<div class="col-md-4">
		<?php echo $notification; ?>
		<?php echo $warning; ?>
	</div>
	</div>
<div class="row">
	<div class="col-md-4"></div>
	<div class="col-md-4">
		<div class="well" style="margin-top: 20px;">
			<h3>Kirjaudu sisään</h3>
			<form action="index.php" method="post">
				<div class="form-group">
					<label for="username">Käyttäjätunnus</label>
					<input type="text" name="user" class="form-control">
				</div>
				<div class="form-group">
					<label for="username">Salasana</label>
					<input type="password" name="pass" class="form-control">
				</div>
				<div class="form-group text-center">
					<input type="submit" name="submit" class="btn btn-info btn-lg" value="Kirjaudu">
				</div>
			</form>
		</div>
	</div>
</div>
<div class="row">
	<div class="col-md-4"></div>
	<div class="col-md-4">
		<div class="well text-center">
			<h4>Etkö ole vielä rekisteröitynyt?</h4>
			<a href="./authentication/register.php" class="btn btn-success btn-lg">Tee se täällä!</a>
		</div>
	</div>
</div>	

<?php include 'footer.php'; ?>