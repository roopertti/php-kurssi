<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Tehtävä 19</title>
    <style>
        * {
            font-family: "Arial", sans-serif;
            box-sizing: border-box;
        }
        label {
            font-weight: bold;
        }
        .form-group {
            padding 5px;
            margin: 5px 0 5px 0;
        }
        .error {
            color: red;
            font-weight: bold;
        }
        td {
            padding: 3px 7px 3px 7px;
            border: 1px solid black;
            text-align: center;
            background-color: aliceblue;
        }
    </style>
</head>
<body>
    <?php
    //Alustetaan muuttujat
    $fName = $lName = $postal = $age = "";
    $fNameErr = $lNameErr = $postalErr = $ageErr = "";

    //Palvelimen vastaanottaessa post-pyyntö suoritetaan tarkistukset
    if($_SERVER['REQUEST_METHOD'] == "POST") {
        if(empty($_POST['firstname'])) {
            $fNameErr = "Etunimi puuttui!";
        } else {
            $fName = $_POST['firstname'];
        }
        if(empty($_POST['lastname'])) {
            $lNameErr = "Sukunimi puuttui!";
        } else {
            $lName = $_POST['lastname'];
        }
        if(empty($_POST['postal-code'])) {
            $postalErr = "Postinumero puuttui!";
        } else {
            if(strlen($_POST['postal-code']) != 5)
                $postalErr = "Postinumeron pituus oli väärä!";
            else {
                if(!is_numeric($_POST['postal-code']))
                    $postalErr = "Postinumeron kuuluu sisältää vain numeroita!";
                else
                    $postal = $_POST['postal-code'];
            }    
        }
        if(empty($_POST['age'])) {
            $ageErr = "Ikä puuttui!";
        } else {
            if($age < 1 && $age > 100)
                $ageErr = "Ikä ei ollut realistinen! (1-100)";
            else
                $age = $_POST['age'];
        }
    }
    ?>
    <h1>Lomake</h1>
    <form action="index.php" method="post">
        <div class="form-group">    
            <label for="firstname">Etunimi</label><br>
            <input type="text" name="firstname" value="<?php echo $fName; ?>">
            <span class="error">* <?php echo $fNameErr; ?></span>
        </div>
        <div class="form-group">
            <label for="lastname">Sukunimi</label><br>
            <input type="text" name="lastname" value="<?php echo $lName; ?>">
            <span class="error">* <?php echo $lNameErr; ?></span>
        </div>
        <div class="form-group">
            <label for="postal-code">Postinumero</label><br>
            <input type="text" name="postal-code" value="<?php echo $postal; ?>">
            <span class="error">* <?php echo $postalErr; ?></span>
        </div>
        <div class="form-group">
            <label for="age">Ikä</label><br>
            <input type="text" name="age" value="<?php echo $age; ?>">
            <span class="error">* <?php echo $ageErr; ?></span>
        </div>
        <input type="submit" name="submit" value="Lähetä">
    </form>
    <div class="results">
        <?php
        //Lasketaan tyhjät kentät
        $blankFields = 0;
        $data = array($fName, $lName, $postal, $age);
        foreach($data as $item) {
            if($item == "")
                $blankFields++;
        }
        
        //Jos ei yhtään tyhjiä kenttiä
        if($blankFields == 0) {
            echo "<table><thead>";
            echo "<th>Etunimi</th>";
            echo "<th>Sukunimi</th>";
            echo "<th>Postinumero</th>";
            echo "<th>Ikä</th>";
            echo "</thead><tbody><tr>";
            foreach($data as $item) {
                echo "<td>" . $item . "</td>";
            }
            echo "</tbody></table>";
        }
        
        ?>
    </div>
</body>
</html>