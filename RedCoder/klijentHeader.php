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
    <link rel="stylesheet" href="RedCoder/slidestyle.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="RedCoder/scripts/script.js"></script>
    <script src="RedCoder/scripts/slider.js"></script>
    <title>Document</title>
</head>
<body>
<a href ='#top'><img id="logo-small" src="RedCoder/img/logo-small1.png"/></a>

<div id="header">
    <img src="RedCoder/img/logo.png" id="logo"/>
  <div id="head-data">
    <div id="head-nav">
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
    <div id="slider">
      <div id="slide-left"><img src="RedCoder/img/levo.png"/></div>
      <div id="slide-right"><img src="RedCoder/img/desno.png"/></div>
      <ul id="slides">
        <?php
       
        $sql = "SELECT * FROM `objava` WHERE istaknuto = 1 ORDER BY ID DESC LIMIT 5;";
        $result = $conn->query($sql);
    
        if ($result->num_rows > 0) {
            // output data of each row
            
            while($row = $result->fetch_assoc()) {
                echo '<li class="slide">';
                echo ' <img src="RedCoder/img/'.$row['slika'].'" />';
                echo "<div><a href='klijentObjava.php?id=".$row['id']."'> <h2>".$row['naslov']."</h2></a>
                <p>".$row['tekst']."</p>
                </div></li>";
            }
        } else {
            echo "0 results";
        }

        $sql = "SELECT * FROM `objava` WHERE istaknuto = 1 ORDER BY ID DESC LIMIT 1;";
        $result = $conn->query($sql);
    
        if ($result->num_rows > 0) {
            // output data of each row
            
            while($row = $result->fetch_assoc()) {
                echo '<li class="slide">';
                echo ' <img src="RedCoder/img/'.$row['slika'].'" />';
                echo '<div> <h2>'.$row['naslov'].'</h2>
                <p>'.$row['tekst'].'</p>
                </div></li>';
            }
        } else {
            echo "0 results";
        }
        
        ?>
  </div>
</div>