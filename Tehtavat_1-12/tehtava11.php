<?php

// Tehtävä 11

function laskeIka($year = 1980) {
    return date("Y") - $year . '<br>';
}

echo laskeIka();
echo laskeIka(1994);
echo laskeIka(0);
?>