<?php
    session_start();


    include_once 'conn.php';

    $email = $_POST['email'];
    $sifra = $_POST['sifra'];

    $sql = "SELECT * FROM klijent WHERE email = '$email';";
    $result = mysqli_query($conn, $sql);
    if ($result->num_rows > 0) {
            
        while($row = $result->fetch_assoc()) {
            if($sifra != $row['sifra']) {
                header("Location: ../prijava.php");
            }
            else {
                $_SESSION['k_id'] = $row['id'];
                $_SESSION['k_ime'] = $row['ime'];
                $_SESSION['k_prezime'] = $row['prezime'];
                $_SESSION['k_email'] = $row['email'];
                $_SESSION['k_uloga'] = $row['uloga'];
                $_SESSION['k_slika'] = $row['slika'];
                header("Location: ../klijentHome.php?signup=success");
            }            
        }
    } 