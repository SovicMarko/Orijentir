<?php
    require 'conn.php';
    $termin = $_POST['termin'];
    header("Location:../klijentKategorija.php?search=$termin");

?>