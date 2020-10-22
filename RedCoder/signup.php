<?php
    require 'conn.php';

    $ime = $_POST['ime'];
    $prezime = $_POST['prezime'];
    $email = $_POST['email'];
    $sifra1 = $_POST['sifra1'];
    $sifra2 = $_POST['sifra2'];

    if (empty($ime) || empty($prezime) || empty($email) || empty($sifra1)) {
        // echo 'Popunite sva polja';
        header("Location: ../registracija.php?greska=prazno&ime=".$ime."&prezime=".$prezime);
        exit();
    }
    else if (
        !filter_var($email, FILTER_VALIDATE_EMAIL) && 
        !preg_match("/^[a-zA-Z0-9]*$/", $ime) &&
        !preg_match("/^[a-zA-Z0-9]*$/", $prezime)
        ) {
            header("Location: ../registracija.php?greska=svi");
            exit();
    }
    else if (!filter_var($email, FILTER_VALIDATE_EMAIL)){  
        header("Location: ../registracija.php?greska=email&ime=".$ime."&prezime=".$prezime);
        exit();
    } 
    else if (!preg_match("/^[a-zA-Z0-9]*$/", $ime)) {
        header("Location: ../registracija.php?greska=ime&email=".$email."&prezime=".$prezime);
        exit();
    }
    else if (!preg_match("/^[a-zA-Z0-9]*$/", $prezime)) {
        header("Location: ../registracija.php?greska=prezime&email=".$email."&ime=".$ime);
        exit();
    }
    else if ($sifra1 !== $sifra2) {
        header("Location: ../registracija.php?greska=sifre&ime=".$ime."&prezime=".$prezime."&email=".$email);
        exit();
    }
    else {
        $sql = "SELECT email FROM klijent WHERE email=?";
        $stmt = mysqli_stmt_init($conn);
        if(!mysqli_stmt_prepare($stmt, $sql)) {
            header("Location: ../registracija.php?greska=svi");
            exit();
        } 
        else {
            mysqli_stmt_bind_param($stmt, "s", $email);
            mysqli_stmt_execute($stmt);
            mysqli_stmt_store_result($stmt);
            $resultCheck = mysqli_stmt_num_rows($stmt);
            if ($resultCheck > 0) {
                header("Location: ../registracija.php?greska=zauzeto");
                exit();
            } 
            else {
                $sql = "INSERT INTO `klijent`(`ime`, `prezime`, `email`, `sifra`, `uloga`, `slika`)
                VALUES (?,?,?,?,'klijent','');";
                $stmt = mysqli_stmt_init($conn);
                if(!mysqli_stmt_prepare($stmt, $sql)) {
                    header("Location: ../registracija.php?greska=svi");
                    exit();
                } 
                else {
                    mysqli_stmt_bind_param($stmt, "ssss", $ime, $prezime, $email, $sifra1);
                    mysqli_stmt_execute($stmt);
                    mysqli_stmt_store_result($stmt);
                    header("Location: ../klijentHome.php?signup=success");
                }
            }
        }


        

        
        // mysqli_query($conn,$sql);
        
    }


?>