<?php

// Jos nimi on tyhjä tai koulutusta ei ole valittu, tulostetaan sivulle tieto puutteista. Jos tiedot ovat oikein, tulostetaan ne sivulle HTML-taulukkoon.
$name_ok = false;
$education_ok = false;
$gender_ok = false;

if($_SERVER["REQUEST_METHOD"] == "POST") {
    if(empty($_POST['name'])) {
        echo "Nimi-kenttä on jätetty tyhjäksi!<br>";
    } else {
        $name_ok = true;
    }
    
    if(empty($_POST['education'])) {
        echo "Koulutusta ei ole valittu!<br>";
    } else {
        $education_ok = true;
    }
    
    if(empty($_POST['gender'])) {
        echo "Sukupuolta ei ole valittu!<br>";
    } else {
        $gender_ok = true;
    }
    
    if($name_ok && $education_ok && $gender_ok) {
        $name = $_POST['name'];
        $education = $_POST['education'];
        $gender = $_POST['gender'];
        printTable($name, $education, $gender);
        echo "<a href='/php-kurssi/Tehtavat_13-18/Tehtava17/kiitos.php?name=".$name."'>Jatka tästä</a>";
    } 
}

function printTable($name, $education, $gender) {
    $el = "<table><thead><th>Nimi</th><th>Sukupuoli</th><th>Koulutus</th></thead>";
    $el .= "<tbody><tr>";
    $el .= "<td>".$name."</td>";
    $el .= "<td>".$gender."</td>";
    $el .= "<td>";
    foreach($education as $item) {
        $el .= $item . " ";
    }
    $el .="</td>";
    $el .= "</tr></tbody></table>";
    
    echo $el;
}
?>