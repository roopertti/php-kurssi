<?php

//Tehtävä 6

function countNetAmount($fullSalary, $taxPercent, $name, $sotu) {
    $netSalary = $fullSalary * (1 - ($taxPercent / 100));
    echo '<div>';
    echo '<h1>Henkilö: ' . $name . '</h1>';
    echo '<h2>Sotu: ' . $sotu . '</h2>';
    echo '<ul>';
    echo '<li>Bruttotulot: ' . $fullSalary . '</li>';
    echo '<li>Nettotulot: ' . $netSalary . '</li>';
    echo '<li>Veroprosentti: ' . $taxPercent . '</li>';
    echo '</ul>';
    echo '</div>';
}

countNetAmount(100, 25, "Matti Meikäläinen", "123456-1212");
countNetAmount(2300, 14, "Jaska Jokunen", "654321-1111");

?>