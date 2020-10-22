<?php
    require 'conn.php';
    print_r($_POST);
    $pozicija = $_POST['pozicija'];
    $naziv = $_POST['naziv'];
    
    $slika = $imeSlike = $imeSlikeTmp = $velicinaSlike = $greskaSlika = $tipSlike = '';
    if ($_FILES['slika']['size'] > 0) {
        $slika = $_FILES['slika'];

        $imeSlike= $_FILES['slika']['name'];
        $imeSlikeTmp= $_FILES['slika']['tmp_name'];
        $velicinaSlike = $_FILES['slika']['size'];
        $greskaSlika = $_FILES['slika']['error'];
        $tipSlike = $_FILES['slika']['type'];
        print_r($slika);

        $ekstSlike = explode('.', $imeSlike);
        $dozvoljeneEkst = ['png','PNG','jpg','JPG','jpeg','JPEG'];

        if (in_array($ekstSlike[1],$dozvoljeneEkst)) {
            if ($greskaSlika === 0) {
                if ($velicinaSlike < 1000000) {
                    $novoImeSlike = uniqid('',true).".".$ekstSlike[1];
                    $destinacijaSlike = 'img/'.$novoImeSlike;
                    move_uploaded_file($imeSlikeTmp,$destinacijaSlike);
                    //echo "uspeh";

                    $sql = "INSERT INTO `reklama`(`pozicija`, `slika`, `naziv`) 
                    VALUES ('$pozicija','$novoImeSlike','$naziv');";
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
    header("Location: ../adminReklame.php?unos=uspeh");
?>