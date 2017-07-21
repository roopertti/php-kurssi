<?php

// Tehtävä 7

function returnArraySum($arr) {
    
    $sum = 0;
    
    for($i = 0; $i < count($arr); $i++) {
        $sum += $arr[$i];
    }
    
    return $sum;
}

$intArr = array(1,2,3,4,5,6,7,8);

echo returnArraySum($intArr);
?>