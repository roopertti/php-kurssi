<?php

$cookie_name = "testi_keksi";

if(!isset($_COOKIE['testi_keksi'])) {
    $cookie_value = 0;
    setcookie($cookie_name, $cookie_value, time() + 10);
    echo "<h2>Tervetuloa sivustolle ensimmäistä kertaa!";
} else {
    $cookie_value = $_COOKIE['testi_keksi'] + 1;
    setcookie("testi_keksi", $cookie_value, time() + 10);
    echo "<h2>Olet vieraillut sivulla " . $cookie_value . " kertaa.</h2>";
    
}

?>