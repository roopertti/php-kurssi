<?php

/*Tee PHP:n avulla funktio ”halkaise”, joka halkaisee parametrina tulleen merkkijonon ”keskeltä” kahtia (alkuosa tulostetaan päinvastaisessa järjestyksessä ja loppuosa isoilla kirjaimilla, esim kirjakauppa -> kjarik ja AUPPA. Tee funktioon tarvittavat tarkistukset (kokeile funktion toimivuutta myös väärillä arvoilla).*/

function splitString($str) {
    
    if($str == "" || strlen($str) < 2 ) {
        echo "Liian lyhyt merkkijono." . "<br>";
    } else {
        if(!ctype_alpha($str)) {
            echo "[Huomio: vain kirjaimet tulostuvat isoina!] ";
        }
        $arr = str_split($str);
        $halfway = round(count($arr) / 2);
        $strReversed = "";
        $strUpper = "";

        for($i = 0; $i < count($arr); $i++) {
            if($i < $halfway)
                $strReversed .= $arr[$i];
            else
                $strUpper .= $arr[$i];
        }

        $strReversed = strrev($strReversed);
        $strUpper = strtoupper($strUpper);

        echo $strReversed . " " . $strUpper . "<br>";
    }
}

splitString("kirjakauppa");
splitString("");
splitString("k");
splitString("ki");
splitString(123416);


?>