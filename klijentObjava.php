<?php
    require 'RedCoder/conn.php';
    require 'RedCoder/klijentKategorijaHeader.php';
    require 'RedCoder/klijentNav.php';
?>

     <div id="news">
     <?php

        $id = $_GET['id'];
        $sql = "SELECT * FROM objava WHERE id = $id;";
        $result = $conn->query($sql);
    
        if ($result->num_rows > 0) {
            
            while($row = $result->fetch_assoc()) {
                
                echo "<div class='post'>";
                echo "<h1>".$row['naslov']."</h1><hr>";
                echo "<img src='RedCoder/img/".$row['slika']."'>";
                echo "<div><p>".$row['tekst']."</p></div>";
                
            }
        } 
    
    ?>
    <div id="komentari">
        <?php
            if(isset($_SESSION['k_id'])) {
                echo "<a href='RedCoder/unosOmiljene.php?id=$id'><button type='button'>Dodaj u omiljeno</button></a>";
                echo "<h3>Unesite komentar:</h3><hr>";
                echo "<form action='RedCoder/unosKomentara.php?id=$id' method='post' name='unosKomentara' id='unosKomentara'>";
                echo '<textarea name="tekst" id="" cols="30" rows="10"></textarea><br>';
                echo '<input type="submit" value="Potvrdi"';
            } else {
                echo "<p>Samo prijavljeni korisnici mogu ostavljati komentare";
                echo "<br>Molimo prijavite se - <a href='prijava.php'>Prijava</a> - <a href='prijava.php'>Registracija</a>";
            }
        ?>>
        <div id="lista-komentara">
        <?php

            $id = $_GET['id'];
            $sql = "SELECT komentar.tekst, komentar.id_objave, komentar.id_autora, klijent.ime, klijent.prezime, klijent.slika FROM `komentar`
                    INNER JOIN klijent ON klijent.id = komentar.id_autora
                    INNER JOIN objava ON objava.id = komentar.id_objave
                    WHERE objava.id = $id;";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                echo "<h3>Komentari:</h3><hr>";
                while($row = $result->fetch_assoc()) {
                    echo "<div>";
                    if ($row['slika'] == '') {
                        echo "<img src='RedCoder/img/profilna.jpg'>";
                    } else {
                        echo "<img src='RedCoder/img/".$row['slika']."'>";
                    }
                    echo "<h4>".$row['ime']." ".$row['prezime']."</h4>";
                    echo "<p>".$row['tekst']."</p>";
                    echo "</div>";
                }
            } else {
                echo "<h3>Nema komentara</h3>";
            }
           

            ?>
        </div>
    </div>
        </div>
    
     <div id="right">
          <?php
             $sql = "SELECT * FROM `reklama` WHERE pozicija = 3;";
             $result = $conn->query($sql);
             if ($result->num_rows > 0) {
                 while($row = $result->fetch_assoc()) {
      
                    echo "<img src='RedCoder/img/".$row['slika']."'>";
                 }
             } else {
                 echo "";
             }
             $conn->close();
          ?>
          </div>
    </div>

              
         
        <?php require 'RedCoder/klijentFooter.php'; ?>