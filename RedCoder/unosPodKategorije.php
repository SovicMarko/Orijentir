<?php
    require "conn.php";

    $naziv = $_POST['naziv'];

    $sql = "INSERT INTO `podkategorija`(`naziv`) 
            VALUES ('$naziv');";
    mysqli_query($conn,$sql);
    header("Location: ../adminKategorije.php?id=$id");
?>