<?php

//Tehtävä 14

function renderSelect($arr) {
    $el = "<select name='city'>";
    foreach($arr as $city) {
        $el .= "<option value=" . $city . ">" . $city . "</option>";
    }
    $el .= "</select>";
    echo $el;
}
?>