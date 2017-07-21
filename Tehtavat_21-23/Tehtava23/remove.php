<?php include "./actions.php"; ?>

<?php
$successMsg = "";
$errorMsg = "";

if(isset($_POST['submit']))
    if(array_key_exists($_POST['city'], $_SESSION['cities'])) {
        unset($_SESSION['cities'][$_POST['city']]);
        $successMsg = "Poisto onnistui!";
    } else {
        $errorMsg = "Poistaminen ei onnistunut!";
    }
?>


<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Tehtävä 23</title>
    <style>
        * {
            font-family: "Arial", sans-serif;
        }
        label {
            font-weight: bold;
        }
        .btn {
            margin: 5px 0 0 0;
        }
    </style>
</head>
<body>
    <?php printCities(); ?>
    <form action="remove.php" method="post">
        <h3>Poista kaupunkeja</h3>
        <label for="city">Kaupungin nimi</label>
        <input type="text" name="city">
        <input type="submit" name="submit" value="Poista">
    </form>
    <?php echo $successMsg . $errorMsg; ?>
</body>
</html>