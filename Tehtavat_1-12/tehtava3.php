<?php

//Tehtävä 3 - dynaamisempi ratkaisu 2-ulotteisella taulukolla

$data = array(
    array("Matti", 4),
    array("Teppo", 3),
    array("Jukka", 2),
    array("Kaisa", 5)
);

function getValues($data) {
    foreach($data as $arr) {
        echo '<tr>';
        foreach($arr as $prop) {
            echo '<td>' . $prop . '</td>';
        }
        echo '</tr>';
    }
}

//Tehtävä 3 - tehtävänannon mukainen ratkaisu

$names = array("Matti", "Teppo", "Jukka", "Kaisa");
$grades = array(4, 3, 2, 5);

function getValues2($names, $grades) {
    for($i=0;$i<4;$i++) {
        echo '<tr>';
        echo '<td>' . $names[$i] . '</td>';
        echo '<td>' . $grades[$i] . '</td>';
        echo '</tr>';
    }
}
    
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Arvosanataulukko</title>
</head>
<body>
    <table>
        <thead>
            <th>Nimi</th>
            <th>Arvosana</th>
        </thead>
        <tbody>
          <!--dynaaminen-->
           <?php
            getValues($data);
           ?>
        </tbody>
    </table>
    <table>
        <thead>
            <th>Nimi</th>
            <th>Arvosana</th>
        </thead>
        <tbody>
          <!--tehtävänannon mukainen-->
           <?php
            getValues2($names, $grades);
           ?>
        </tbody>
    </table>
</body>
</html>