<?php

//Tehtävä 10

function printAsHTMLTable($arr) {  
    echo "<table><thead>";
    echo "<th>Postinumero</th>";
    echo "<th>Toimipaikka</th>";
    echo "</thead>";
    echo "<tbody>";
    foreach($arr as $num => $city) {
        echo "<tr>";
        echo "<td>" . $num . "</td>" . "<td>" . $city . "</td>";
        echo "</tr>";
    }
    echo "</tbody></table>";
}

$assocArr = array(80100=>"Joensuu 10", 81200 => "Eno", 80330 => "Reijola");
printAsHTMLTable($assocArr);

?>