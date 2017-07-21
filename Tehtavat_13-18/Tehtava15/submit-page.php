<?php

//Tehtävä 15

if(isset($_POST['submit'])) {
    $city = $_POST['city'];
    $code = $_POST['postal-code'];
    
    if(strlen($code) != 5) {
        echo "Postinumero ei ole oikea!<br>";
        echo "<a href='/php-kurssi/Tehtavat_13-18/Tehtava15/index.php?virhe=postinumero'>Kokeile uudestaan!</a>";
    } else {
        echo $city . " - " . $code . "<br>";
    }
}
?>