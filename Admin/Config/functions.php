<?php

function isConnect(){
    if (isset($_SESSION['connect']) && $_SESSION['connect'] == true) {
        return true;
    } else {
        return false;
    }
}

function cleanDirtyText(String $dirty = null): String {
    $cleaned = addslashes($dirty); //  échapper tous les caractères qui doivent l'être
    $cleaned = htmlentities($cleaned);
    return $cleaned;
}
?>