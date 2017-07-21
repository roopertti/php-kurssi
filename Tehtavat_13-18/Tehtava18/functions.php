<?php
function checkReg($reg) {
    if(strlen($reg) != 7) {
        echo "Virheellinen pituus";
        return false;
    } else {
        $reg = str_split($reg);
        if($reg[3] != "-") {
            echo "Rekisterin keskimmäisen merkin tulee olla: -";
            return false;
        } else {
            $chars = $reg[0] . $reg[1] . $reg[2];
            $nums = $reg[4] . $reg[5] . $reg[6];
            if(!ctype_alpha($chars) && !is_numeric($nums)) {
                echo "Rekisteri ei sisällä oikeanlaisia arvoja";
                return false;
            } else {
                return true;
            } 
        }
    }
}

function returnNumsOfReg($reg) {
    $reg = str_split($reg);
    return array($reg[4],$reg[5],$reg[6]);
}

function returnCharsOfReg($req) {
    $req = str_split($req);
    return array($req[0],$req[1],$req[2]);
}

function reserve($reg) {
    $nums = returnNumsOfReg($reg);
    if($nums[0] >= 1 && $nums[0] <= 5)
        echo "Rekisterinumerolle " . $reg . " on varattu aika 09.09.2017.";
    else
        echo "Rekisterinumerolle " . $reg . " on varattu aika 04.04.2018.";
}

function checkIfCharOnRange($char) {
    foreach(range('a', 'h') as $letter) {
        if($char == $letter)
            return true;
        else
            return false;
    }
}

function suggest($reg) {
    $chars = returnCharsOfReg($reg);
    if(checkIfCharOnRange($chars[0])) {
        $url1 = "<a href='/php-kurssi/Tehtavat_13-18/Tehtava18/index.php?";
        $url1 .= "period=spring&id=0&reg=".$reg."'>12.02.2018</a>";
        $url2 = "<a href='/php-kurssi/Tehtavat_13-18/Tehtava18/index.php?";
        $url2 .= "period=spring&id=1&reg=".$reg."'>04.02.2018</a>";
        $url3 = "<a href='/php-kurssi/Tehtavat_13-18/Tehtava18/index.php?";
        $url3 .= "period=spring&id=2&reg=".$reg."'>22.02.2018</a>";
        echo $url1 . '<br>' . $url2 . '<br>' . $url3 . '<br>';
    } else {
        $url1 = "<a href='/php-kurssi/Tehtavat_13-18/Tehtava18/index.php?";
        $url1 .= "period=autumn&id=0&reg=".$reg."'>12.09.2017</a>";
        $url2 = "<a href='/php-kurssi/Tehtavat_13-18/Tehtava18/index.php?";
        $url2 .= "period=autumn&id=1&reg=".$reg."'>04.09.2017</a>";
        $url3 = "<a href='/php-kurssi/Tehtavat_13-18/Tehtava18/index.php?";
        $url3 .= "period=autumn&id=2&reg=".$reg."'>22.09.2017</a>";
        echo $url1 . '<br>' . $url2 . '<br>' . $url3 . '<br>';
    }
}

?>