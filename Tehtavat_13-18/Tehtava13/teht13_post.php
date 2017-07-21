<?php

//Tehtävä 13

function render() {
    $el = "<table>";
    $el .= "<thead>";
    $el .= "<th>Nimi</th>";
    $el .= "<th>Osoite</th>";
    $el .= "<th>Puhelin</th>";
    $el .= "<th>Kirja 1</th>";
    $el .= "<th>Kirja 2</th>";
    $el .= "<th>Kirja 3</th>";
    $el .= "</thead><tbody>";
    
    if(isset($_POST['submit'])) {
        $name = $_POST['name'];
        $address = $_POST['address'];
        $number = $_POST['number'];
        $book1 = $_POST['book1'];
        $book2 = $_POST['book2'];
        $book3 = $_POST['book3'];
        $books = array($book1, $book2, $book3);
        $booksMissing = 0;
        
        $el .= "<tr>";
        $el .= "<td>" . $name . "</td>";
        $el .= "<td>" . $address . "</td>";
        $el .= "<td>" . $number . "</td>";
        
        foreach($books as $book) {
            if($book != "")
                $el .= "<td>" . $book . "</td>";
            else
                $booksMissing++;
        }
        
        if($booksMissing > 0) {
            echo "Kirjallisuus tekee hyvää itse kullekkin!<br>";
            echo "Käy vierailemassa Kansalliskirjaston sivuilla: <a href='https://www.kansalliskirjasto.fi/fi'>Kansalliskirjasto</a>";
        }
        
        $el .= "</tr>";
    }
    
    $el .= "</tbody></table>";
    echo $el;
    
}

render();
?>