<?php

//Tehtävä 12

function vaihdaLuvut($num1, $num2) {    
    if($num1 > $num2) {
        $num1 = $num1 + $num2;
        $num2 = $num1 - $num2;
        $num1 = $num1 - $num2;
    }
    
    return "Luku1: " . $num1 . " Luku2: " . $num2 . '<br>';
}

echo vaihdaLuvut(1,2);
echo vaihdaLuvut(3,2);
echo vaihdaLuvut(100,1);
echo vaihdaLuvut(56,23);
echo vaihdaLuvut(10,20);
?>