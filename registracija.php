<?php
    // session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="RedCoder/registracija.css">
    <title>Document</title>
</head>
<body>
    <?php
        $greska = $ime = $prezime = $email = "";
        if(isset($_GET['greska'])) {
            switch ($_GET['greska']) {
                case 'prazno':
                    $greska = 'Molimo popunite sva polja';
                    $ime = $_GET['ime'];
                    $prezime = $_GET['prezime'];
                    break;
                case 'email':
                    $greska = 'Email nepravilno unet';
                    $ime = $_GET['ime'];
                    $prezime = $_GET['prezime'];
                    break;
                case 'ime':
                    $greska = 'Ime nepravino uneto';
                    $email = $_GET['email'];
                    $prezime = $_GET['prezime'];
                    break;
                case 'prezime':
                    $greska = 'Prezime nepravino uneto';
                    $email = $_GET['email'];
                    $ime = $_GET['ime'];
                    break;
                case 'svi':
                    $greska = 'Greska u unosu podataka';
                    break;
                case 'sifra':
                    $greska = 'Lozinke se ne podudaraju';
                    $email = $_GET['email'];
                    $ime = $_GET['ime'];
                    $prezime = $_GET['prezime'];
                    break;
                case 'zauzeto':
                    $greska = 'Vec postoji nalog sa unetim emailom - <a href="../prijava.php">prijavi se</a>';
                    break;
                // case 'email':
                //     $greska = 'Molimo popunite sva polja';
                //     break;
                // case 'email':
                //     $greska = 'Molimo popunite sva polja';
                //     break;
                
                default:
                    # code...
                    break;
            }
        }
    ?>


    <form action="RedCoder/signup.php" method="POST">
        <img src="RedCoder/img/logo.png" alt="">
        <h4><?php echo $greska?></h4>
        <input type="text" name="ime" placeholder="Unesite ime" value="<?php echo $ime?>"><br>
        <input type="text" name="prezime" placeholder="Unesite prezime" value="<?php echo $prezime?>"><br>
        <input type="text" name="email" placeholder="Unesite email" value="<?php echo $email?>"><br>
        <input type="password" name="sifra1" placeholder="Unesite lozinku"><br>
        <input type="password" name="sifra2" placeholder="Potvrdite lozinku"><br>
        <input type="submit" value="Registruj se">
    </form>
</body>
</html>