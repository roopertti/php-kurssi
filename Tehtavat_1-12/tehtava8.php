<?php

//Tehtävä 7

function arrCalculations($arr) {
    $min = $arr[0];
    $max = $arr[0];
    
    foreach($arr as $num) {
        if($min > $num) {
            $min = $num;
        }
        if($max < $num) {
            $max = $num;
        }
    }
    
    $sum = 0;
    
    foreach($arr as $num) {
        $sum += $num;
    }
    $avg = $sum / count($arr);
    
    
    echo "Pienin arvo: " . $min . '<br>';
    echo "Suurin arvo: " . $max . '<br>';
    echo "Keski-arvo: " . $avg . '<br>';
    echo "Summa: " . $sum;
}

$arr = array(5,3,4,5,6,9,1,50);

arrCalculations($arr);

?>