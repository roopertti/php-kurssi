<?php

//Tehtävä 14

if(isset($_POST['submit'])) {
    $city = $_POST['city'];
    $code = $_POST['postal-code'];
    
    if(strlen($code) != 5) {
        echo "Postinumero ei ole oikea!<br>";
        echo "<a href='/php-kurssi/Tehtavat_13-18/Tehtava14/index.php'>Kokeile uudestaan!</a>";
        
    } else {
        echo $city . " - " . $code . "<br>";
    }
}

?>