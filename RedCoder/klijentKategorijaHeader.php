<?php
    session_start();
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="RedCoder/klijentstyle.css">
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
          <li> 
            <form action="RedCoder/klijentPretraga.php" method="post">
              <input type="text" name='termin'/>
              <input type="submit" value="Traži"/>
            </form>
          </li>
        </ul>
      </div>
      <div id="pinned">
          <?php 
            $sql = "SELECT * FROM `objava` WHERE istaknuto = 1 ORDER BY ID DESC LIMIT 3;";
            $result = $conn->query($sql);
        
            if ($result->num_rows > 0) {
                // output data of each row
                
                while($row = $result->fetch_assoc()) {
                    echo '<div class="pin-post">';
                    echo "<img src='RedCoder/img/".$row['slika']."'>";
                    echo "<a href='klijentObjava.php?id=".$row['id']."'><h3>".$row['naslov']."</h3></a> </div>";
                }
                echo "</tbody></table>";
            } else {
                echo "0 results";
            }
            $conn->close();
          ?>
        <!-- <div class="pin-post">
          <img src="political.jpg">
          <h3>Naslov najnovije vesti medju istaknutim vestima</h3>
        </div>
        <div class="pin-post">
          <img src="economic.jpg">
          <h3>ra ta ta ta ta ta ta ta ta ta ta ta ta ta ta ta ta ta ha ha (96 karaktera max)!</h3>
        </div>
        <div class="pin-post">
          <img src="culture.jpg">
          <h3>123456789 12345678912345 123456789 12345678912345 123456789 12345678912345 123456789 12345678912345</h3>
        </div> -->
      </div>
    </div>
  </div>