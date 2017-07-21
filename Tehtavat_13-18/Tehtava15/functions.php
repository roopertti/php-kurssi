<?php

//Tehtävä 15

function renderSelect($arr) {
    $el = "<select name='city'>";
    foreach($arr as $city) {
        $el .= "<option value=" . $city . ">" . $city . "</option>";
    }
    $el .= "</select>";
    echo $el;
}

function showErrorMsg() {
    if(isset($_GET['virhe'])) {
        if($_GET['virhe'] == "postinumero") {
            echo "Postinumero oli virheellinen, kokeile uudestaan.";   
        }
    }
}
?>