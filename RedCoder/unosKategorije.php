<?php
    require "conn.php";

    $naziv = $_POST['naziv'];

    $sql = "INSERT INTO `kategorija`(`naziv`) 
            VALUES ('$naziv');";
    mysqli_query($conn,$sql);
    header("Location: ../adminKategorije.php?id=$id");
?>