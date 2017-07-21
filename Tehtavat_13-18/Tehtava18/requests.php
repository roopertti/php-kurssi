<?php

if(isset($_POST['reserve']) || isset($_POST['suggest'])) {
        if(!empty($_POST['owner'])) {
            $reg = $_POST['reg-num'];
            if(checkReg($reg)) {
                if(isset($_POST['reserve']))
                    reserve($reg);
                else if(isset($_POST['suggest']))
                    suggest($reg);
            } else {
                echo "Virheellinen rekisterinumero!";
            }    
        } else {
            echo "Omistajan nimi vaaditaan!";
        }  
    }
    
    if(isset($_GET['period']) && isset($_GET['id']) && $_GET['reg']) {
        $msg = "Rekisterinumerolle " . $_GET['reg'] . " on varattu aika";
        if($_GET['period'] == "autumn")
            $msg .= " " . $datesSep[$_GET['id']] . ".";
        else if($_GET['period'] == "spring")
            $msg .= " " . $datesFeb[$_GET['id']] . ".";
        echo $msg;
    }

?>