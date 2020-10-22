<?php
    session_start();

    if ($_SESSION['k_uloga'] !== 'admin') {
        header("Location:klijentHome.php");
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="RedCoder/style.css">
    <title>Document</title>
</head>
<body>
    <nav>
        <header>
            
            <p>Admin: <strong><?php echo $_SESSION['k_ime'].' '.$_SESSION['k_prezime'] ?></strong></p>
            <p>Orijetnir web aplikacija</p>
        </header>
        <ul>
            <a href="adminHome.php"><li>Početna</li></a>
            <a href="adminKategorije.php"><li>Kategorije</li></a>
            <a href="adminObjave.php"><li>Objave</li></a>
            <!-- <a href=""><li>Oglasi</li></a>
            <a href=""><li>Oglašivači</li></a> -->
            <a href="adminKorisnici.php"><li>Korisnici</li></a>
            <a href="adminUnosObjave.php"><li>Unos objave</li></a>
            <a href="adminReklame.php"><li>Reklame</li></a>
            <a href="klijentHome.php"><li>Orijentir</li></a>
        </ul>
      
    </nav>