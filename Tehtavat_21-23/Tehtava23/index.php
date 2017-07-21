<?php
//Tehtävä 23

/*
    array_key_exists() - funktio ei jostain syystä toiminut itselläni.
    Tietääkseni tämän pitäisi toimia.
    Jokatapauksessa assosiatiivisessa taulukossa kaupunki ilmenee vain kerran.
*/

session_start();
$printLink = "";
$removeLink = "";
$submitErr = "";

if(isset($_POST['submit'])) {
    $city = $_POST['city'];
    $temperature = $_POST['temperature'];
    
    if(!isset($_SESSION['cities'])) {
        $_SESSION['cities'] = array($city=>$temperature);
    } else {
        if(array_key_exists($city, $_SESSION['cities'])) {
            echo "mi";
            $submitErr = "Kaupungille on jo syötetty tiedot!";
        } else {
            $arr = array($city => $temperature);
            array_merge($arr, $_SESSION['cities']);
        }
    }
}

if(!isset($_SESSION['visited'])) {
    $_SESSION['visited'] = true;
} else {
    $printLink = "<a href='actions.php?tulosta'>Tulosta</a>";
    $removeLink = "<a href='remove.php'>Poista tietoja</a>";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Tehtava23</title>
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
    <?php echo $submitErr; ?>
    <h1>Syötä kaupunki ja lämpötila!</h1>
    <form action="index.php" method="post">
        <label for="city">Kaupunki</label><br>
        <input type="text" name="city"><br>
        <label for="temperature">Lämpötila</label><br>
        <input type="text" name="temperature"><br>
        <input class="btn" type="submit" name="submit" value="Tallenna">
    </form>
    <?php echo $printLink . " | " . $removeLink; ?><br>
    <p>Tietojen tarkastelu ja poistaminen onnistuu ylläolevista linkeistä!</p>
</body>
</html>