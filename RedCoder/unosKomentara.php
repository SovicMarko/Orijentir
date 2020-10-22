<?php
    session_start();
    require "conn.php";
    
    $id = $_GET['id'];
    $tekst = $_POST['tekst'];
    $idKlijenta = $_SESSION['k_id'];

    $sql = "INSERT INTO `komentar`(`id_autora`, `id_objave`, `tekst`) 
            VALUES ($idKlijenta,$id,'$tekst');";
    mysqli_query($conn,$sql);
    header("Location: ../klijentObjava.php?id=$id");
?>