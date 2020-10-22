<?php
    session_start();
    if(!isset($_SESSION['k_id'])) {
      header("Location: ../klijentHome.php");
    }
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="RedCoder/klijentstyle.css">
    <link rel="stylesheet" href="RedCoder/klijentProfilnaStyle.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="RedCoder/scripts/script.js"></script>
    <title>Document</title>
</head>
<body>
<a href ='klijentHome.php'><img id="logo-small" src="RedCoder/img/logo-small1.png"/></a>

  <div id="c-header">
      <a href ='klijentHome.php'><img src="RedCoder/img/logo.png" id="c-logo"/></a>
    <div id="c-head-data">
      <div id="c-head-nav">
        <ul>
         <?php
             if(isset($_SESSION['k_id'])) {
                echo '<li><a href="klijentProfilna.php"><p>'.$_SESSION['k_ime'].'</p></a></li>';
                echo '<li><a href="RedCoder/logout.php"><p>Odjava</p></a></li>';
            } else {
                echo '<li><a href="../registracija.php"><p>Registracija</p></a></li>';
                echo '<li><a href="../prijava.php"><p>Prijava</p></a></li>';
            }
         ?>
          <li><input type="text"/>
              <input type="submit" value="Traži"/>
          </li>
        </ul>
      </div>
      <div id="pinned">
        
        
        <?php

            $sql = "SELECT * FROM `klijent` WHERE klijent.id = ".$_SESSION['k_id'].";";

            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
            
            while($row = $result->fetch_assoc()) {
               $slika = $row['slika']; }
            }
            if ($slika === '') {
               $slika = 'profilna.jpg';
            }
            echo "<img src='RedCoder/img/$slika'>";
            echo  "<h3>".$_SESSION['k_ime']."</h3>";
            echo  "<h3>".$_SESSION['k_prezime']."</h3>";
            echo  "<h4>".$_SESSION['k_email']."</h4>";
            if ($_SESSION['k_uloga'] == 'admin') {
                echo  "<h4>ADMINISTRATOR</h4>
                <a href='adminHome.php'><button type='button'>Idi na admin stranu</button></a> <br> <br>";
            }
            echo "<form action='RedCoder/izmenaProfilne.php' method='post' enctype='multipart/form-data'>
                    <input type='file' name='slika'><button type='submit'>Potvrdi</button> 
                  </form>";
        ?>
      </div>
    </div>
  </div>