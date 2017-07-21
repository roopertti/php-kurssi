<h3>Profiilin asetukset</h3>
<p><strong></strong></p>
<p><?php echo date("d.m.Y")?></p>
<a href="./update-user.php?id=<?php echo $_SESSION['userid']; ?>" class="btn btn-default"><?php echo $_SESSION['name']; ?></a>
<a href="./authentication/logout.php" class="btn btn-danger">Kirjaudu ulos</a>