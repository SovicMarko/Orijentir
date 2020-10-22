<?php
    require 'conn.php';
    $zaPretragu = $_POST['termin'];
    header("Location: ../adminObjave.php?search=$zaPretragu");
?>