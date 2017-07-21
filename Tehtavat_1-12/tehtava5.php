<?php

//Tehtävä 5

function printPowers($base, $exp, $amount) {
    for($i = 0;$i < $amount; $i++) {
        echo $base . " potenssiin " . $exp . " = " . pow($base, $exp) . '<br>';
        $base++;
        $exp++;
    }
}

printPowers(1, 0, 6);

?>