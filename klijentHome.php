<?php
   
    require 'RedCoder/conn.php';
    require 'RedCoder/klijentHeader.php';
    require 'RedCoder/klijentNav.php';


    function IspisZaKategoriju($id_kategorije)
    {
      global $conn;
      $sql = "SELECT objava.naslov, objava.id, kategorija.naziv FROM `objava` 
              INNER JOIN kategorija ON kategorija.id = objava.id_kategorije 
              WHERE objava.id_kategorije=$id_kategorije ORDER BY objava.id DESC";
      $result = $conn->query($sql);
      if ($result->num_rows > 0) {
        // echo "<h2>".$row['naziv']."</h2>";
          while($row = $result->fetch_assoc()) {
             echo  '<div class="left-news">
                    <a href="klijentObjava.php?id='.$row['id'].'"><p>'.$row['naslov'].'</p></a>
                   </div>';
          }
      } 
    }
?>

    

      <div id="news">
        <div id="left">
          <?php
            IspisZaKategoriju(1);
            IspisZaKategoriju(2);
            IspisZaKategoriju(3);
            IspisZaKategoriju(4);
            IspisZaKategoriju(5);
            IspisZaKategoriju(6);
            IspisZaKategoriju(7);

          ?>
        </div>

        <div id="center">
          <h3>Najnovije:</h3>
          <?php
           $sql = "SELECT * FROM `objava` ORDER BY id DESC;";
           $result = $conn->query($sql);
       
           if ($result->num_rows > 0) {
               while($row = $result->fetch_assoc()) {
                  echo '<div class="center-news">';
                  echo ' <a href="klijentObjava.php?id='.$row['id'].'"><img src="RedCoder/img/'.$row['slika'].'" /></a>';
                  echo ' <a href="klijentObjava.php?id='.$row['id'].'"><h3>'.$row['naslov'].'</h3></a>
                  <p>'.substr($row['tekst'],0,450).'...</p></div>';
               }
           } else {
               echo "0 results";
           }
          ?>
        </div>

        <div id="right">
          <?php
             $sql = "SELECT * FROM `reklama` WHERE pozicija = 1;";
             $result = $conn->query($sql);
            // echo "<img scr='RedCoder/img/5ceae5f31eaca7.12245189.jpg' />";
             if ($result->num_rows > 0) {
                 while($row = $result->fetch_assoc()) {
      
                    echo "<img src='RedCoder/img/".$row['slika']."'>";
                 }
             } else {
                 echo "0 results";
             }
          
          ?>
          </div>
      </div>
      
         
      <?php require 'RedCoder/klijentFooter.php'; ?>
