<?php

//Tehtävä 2

function embedHyperlink($title, $url) {  
    echo '<a href=' . $url . '>' . $title . '</a>';
}

embedHyperlink("PHP - Wikipedia", "https://fi.wikipedia.org/wiki/PHP");

?>