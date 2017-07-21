<!--Tehtävä 14-->

<?php include "./data.php"; ?>
<?php include "./functions.php"; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Tehtava 14</title>
</head>
<body>
    <h1>Syötä oikea postinumero</h1>
    <form action="submit-page.php" method="post">
        <?php renderSelect($cities); ?>
        <label for="postal-code">Postinumero</label>
        <input type="text" name="postal-code">
        <input type="submit" name="submit" value="Tarkista">
    </form>
</body>
</html>