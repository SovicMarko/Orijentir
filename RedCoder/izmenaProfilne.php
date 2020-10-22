<?php
 session_start();
 require 'conn.php';

 $idKorisnika = $_SESSION['k_id'];
 $novoImeSlike = 'logo1.png';
        
    $slika = $imeSlike = $imeSlikeTmp = $velicinaSlike = $greskaSlika = $tipSlike = '';
    if ($_FILES['slika']['size'] > 0) {
        $slika = $_FILES['slika'];
        // print_r($slika);
        $imeSlike= $_FILES['slika']['name'];
        $imeSlikeTmp= $_FILES['slika']['tmp_name'];
        $velicinaSlike = $_FILES['slika']['size'];
        $greskaSlika = $_FILES['slika']['error'];
        $tipSlike = $_FILES['slika']['type'];

        $ekstSlike = explode('.', $imeSlike);
        // echo $ekstSlike[1];
        $dozvoljeneEkst = ['png','PNG','jpg','JPG','jpeg','JPEG'];

        if (in_array($ekstSlike[1],$dozvoljeneEkst)) {
            if ($greskaSlika === 0) {
                if ($velicinaSlike < 10000000) {
                    $novoImeSlike = uniqid('',true).".".$ekstSlike[1];
                    $destinacijaSlike = 'img/'.$novoImeSlike;
                    move_uploaded_file($imeSlikeTmp,$destinacijaSlike);
                    //echo "uspeh";
                    $sql = "UPDATE `klijent` SET `slika`='$novoImeSlike' WHERE id = $idKorisnika;";
                    mysqli_query($conn,$sql);
                } else {
                    echo 'slika je prevelike velicine';
                }
            } else {
                echo 'Doslo je do greske prilikom dodavanja!';
            }
        } else {
            echo 'Format nije dozvoljen';
        }
    }
    header("Location: ../klijentProfilna.php");

?>