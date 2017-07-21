<?php
//Tehtävä 21

session_start();
$printLink = "";

if(isset($_POST['submit'])) {
    $city = $_POST['city'];
    $temperature = $_POST['temperature'];
    
    if(!isset($_SESSION['cities'])) {
        $_SESSION['cities'] = array($city=>$temperature);
    } else {
        $_SESSION['cities'][$city] = $temperature;
    }
}

if(!isset($_SESSION['visited'])) {
    $_SESSION['visited'] = true;
} else {
    $printLink = "<a href='actions.php?tulosta'>Tulosta</a>";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Tehtava21</title>
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
    <h1>Syötä kaupunki ja lämpötila!</h1>
    <form action="index.php" method="post">
        <label for="city">Kaupunki</label><br>
        <input type="text" name="city"><br>
        <label for="temperature">Lämpötila</label><br>
        <input type="text" name="temperature"><br>
        <input class="btn" type="submit" name="submit" value="Tallenna">
    </form>
    <?php echo $printLink; ?>
</body>
</html>