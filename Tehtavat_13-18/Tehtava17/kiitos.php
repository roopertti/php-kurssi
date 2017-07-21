<?php

if(!isset($_GET['name'])) {
    echo "Virhe";
} else {
    echo "<h2>Kiitos " . $_GET['name'] . ", olemme tallentaneet tietosi!</h2>";
}
?>