<?php
    require 'RedCoder/conn.php';
    require 'RedCoder/klijentKategorijaHeader.php';
    require 'RedCoder/klijentNav.php';
?>

     <div id="news">
        <div id="news-list">
        <?php
        if (isset($_GET['kategorija'])) {
            $kategorija = $_GET['kategorija'];
            $sql = "SELECT * FROM objava WHERE id_kategorije = $kategorija;";
            $result = $conn->query($sql);
        
            if ($result->num_rows > 0) {
                
                while($row = $result->fetch_assoc()) {
                    echo "<div class='new'>";
                    echo "<h2>".$row['naslov']."</h2>";
                    echo "<a><img src='RedCoder/img/".$row['slika']."'></a>";
                    echo "<div><p>".substr($row['tekst'],0,300)."...<br><br><a href='klijentObjava.php?id=".$row['id']."'>detaljnije</a></p></div></div>";
                }
            } else {
                echo "<div class='greska'> Trenutno nema rezultata u kategoriji".$row['id_kategorije']."</div>";
            }
        } else if (isset($_GET['podkategorija'])) {
            $podkategorija = $_GET['podkategorija'];
            $sql = "SELECT * FROM objava WHERE id_podkategorije = $podkategorija;";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                
                while($row = $result->fetch_assoc()) {
                    echo "<div class='new'>";
                    echo "<h2>".$row['naslov']."</h2>";
                    echo "<a><img src='RedCoder/img/".$row['slika']."'></a>";
                    echo "<div><p>".substr($row['tekst'],0,300)."...<br><br><a href='klijentObjava.php?id=".$row['id']."'>detaljnije</a></p></div></div>";
                }

            } else {
                echo "<div class='greska'> Trenutno nema rezultata u kategoriji".$row['id_kategorije']."</div>";
            }
        } else if (isset($_GET['search']))  {
            $termin = $_GET['search'];
            $sql = "SELECT * FROM objava WHERE naslov LIKE '%$termin%';";
            $result = $conn->query($sql);
        
            if ($result->num_rows > 0) {
                
                while($row = $result->fetch_assoc()) {
                    echo "<div class='new'>";
                    echo "<h2>".$row['naslov']."</h2>";
                    echo "<a><img src='RedCoder/img/".$row['slika']."'></a>";
                    echo "<div><p>".substr($row['tekst'],0,300)."...<br><br><a href='klijentObjava.php?id=".$row['id']."'>detaljnije</a></p></div></div>";
                }
            } else {
                echo "<div class='greska'> Nema rezultata pretrage".$row['id_kategorije']."</div>";
            }
        }
            
           
           ?>
        </div>
        <div id="right">
          <?php
             $sql = "SELECT * FROM `reklama` WHERE pozicija = 2;";
             $result = $conn->query($sql);
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
