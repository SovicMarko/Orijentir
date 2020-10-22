<?php

    require 'conn.php';

    // if(isset($_POST['submit'])) {
        

        $naslov = $_POST['naslov'];
        $kategorija = $_POST['kategorijaObjave'];
        $podkategorija = $_POST['podkategorijaObjave'];

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
       

        

        


        $istaknuto = 0;
        if (isset($_POST['istaknuto']))
            $istaknuto = 1;
        else $istaknuto = 0;
        $tekst = $_POST['tekstObjave'];

        // echo $naslov . "<br>";
        // echo $kategorija . "<br>";
        // echo $istaknuto . "<br>";
        // echo $tekst . "<br>";

        // echo "INSERT INTO `objava`(`naslov`, `tekst`, `slika`, `istaknuto`, `id_kategorije`) VALUES ('Neki naslov','neki tekst','aa',1,2);";
        // echo "INSERT INTO `objava`(`naslov`, `tekst`, `slika`, `istaknuto`, `id_kategorije`) VALUES ('$naslov','$tekst','aa',$istaknuto,$kategorija)";

        if ($_GET['izmena'] == 'da')
        {
            $idObjave = $_GET['id'];
            if ($novoImeSlike !== 'logo1.png') {
                $sql = "UPDATE `objava` SET `naslov`='$naslov',`tekst`='$tekst',`slika`='$novoImeSlike',
                `istaknuto`=$istaknuto,`id_kategorije`=$kategorija, `id_podkategorije`=$podkategorija 
                WHERE id = $idObjave;";
            } else {
                $sql = "UPDATE `objava` SET `naslov`='$naslov',`tekst`='$tekst',`istaknuto`=$istaknuto,
                `id_kategorije`=$kategorija, `id_podkategorije`=$podkategorija 
                WHERE id = $idObjave;";
            }
            mysqli_query($conn,$sql);
        } else {
            $sql = "INSERT INTO `objava`(`naslov`, `tekst`, `slika`, `istaknuto`, `id_kategorije`, `id_podkategorije`) 
            VALUES ('$naslov','$tekst','$novoImeSlike',$istaknuto,$kategorija,$podkategorija);";
            mysqli_query($conn,$sql);
          

            // UPDATE `objava` SET `naslov`=[value-2],`tekst`=[value-3],`slika`=[value-4],`istaknuto`=[value-5],`id_kategorije`=[value-6] WHERE id = ;
        }
        header("Location: ../adminHome.php");

    // }
    