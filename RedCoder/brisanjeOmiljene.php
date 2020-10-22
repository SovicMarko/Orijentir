<?php
    session_start();
    require 'conn.php';
    $id = $_GET['id'];
    $idKorisnika = $_SESSION['k_id'];
    $sql = "DELETE FROM `omiljeno` WHERE id_objave=$id AND id_klijenta=$idKorisnika;";
    mysqli_query($conn,$sql);
    header("Location: ../klijentProfilna.php");