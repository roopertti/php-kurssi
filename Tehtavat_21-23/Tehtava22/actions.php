<?php

//Tehtävä 22

session_start();

if(isset($_GET['tulosta'])) {
    if(isset($_SESSION['cities'])) {
        echo '<table><thead><th>Kaupunki</th><th>Lämpötila</th><tbody>';
        foreach($_SESSION['cities'] as $city => $temp) {
            echo '<tr>';
            echo '<td>' .$city . "</td>";
            echo '<td>' . $temp . '</td>';
            echo '</tr>';
        }
    }
    echo '</tbody></table><br>';
    echo "<a href='index.php'>Palaa</a>";
}

?>