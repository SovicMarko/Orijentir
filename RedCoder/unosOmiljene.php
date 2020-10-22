<?php
    session_start();
    require "conn.php";
    
    $id = $_GET['id'];
    $idKlijenta = $_SESSION['k_id'];

    $sql = "INSERT INTO `omiljeno`(`id_klijenta`, `id_objave`) 
            VALUES ($idKlijenta,$id);";
    mysqli_query($conn,$sql);
    header("Location: ../klijentProfilna.php");
?>