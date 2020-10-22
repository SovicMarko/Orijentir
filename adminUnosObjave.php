<?php 
        require 'RedCoder/adminNav.php';
        require 'RedCoder/conn.php';

        function ListaKategorija($pod = false)
        {
            global $conn;
            if (!$pod) {
                $sql = "SELECT id, naziv FROM kategorija;";
            } else {
                $sql = "SELECT id, naziv FROM podkategorija;";
            }
            
            $result = $conn->query($sql);
        
            if ($result->num_rows > 0) {
                if (!$pod) {
                    echo "<select name='kategorijaObjave'>";
                } else {
                    echo "<select name='podkategorijaObjave'>";
                }
                while($row = $result->fetch_assoc()) {
                echo "<option value=".$row['id'].">". $row["naziv"]."</option>"; 
                }
                echo "</select>";
            } else {
                echo "0 results";
            }
        }

?>   
   
   <main>
        <?php
            $naslovValue = '';
            $textValue = '';
            $idObjave = '';
           

            if(isset($_GET['id'])) {
                $idObjave = $_GET['id'];
                $sql = "SELECT * FROM objava WHERE id =  $idObjave;";
                $rezultat = $conn->query($sql);
            
                if ($rezultat->num_rows > 0) {
                    while($row = $rezultat->fetch_assoc()) {
                        $naslovValue = $row['naslov'];
                        $textValue = $row['tekst'];
                        $cekirano = $row['istaknuto'];
                    }
                } else {
                }
            }
        ?>

        <nav>
            <a href="">Podesavanja</a>
            <a href="RedCoder/logout.php">Odjava</a>
        </nav>
        <div id="container">
            <?php 
                if (isset($_GET['izmena'])) {
                    echo "<h2>Izmena Objave</h2>";
                    echo "<form action='RedCoder/novaObjava.php?izmena=da&id=$idObjave' 
                           method='post' name='novaObjava' id='novaObjava' 
                           enctype='multipart/form-data'>";
                } else {
                    echo "<h2>Nova Objava</h2>";
                    echo "<form action='RedCoder/novaObjava.php?izmena=ne' 
                           method='post' name='novaObjava' id='novaObjava' 
                           enctype='multipart/form-data'>";
                }
            ?>
                <div id="levo">
                    <p>Naslov Vesti:</p>
                    <input type="text" name="naslov" value="<?php echo $naslovValue?>">
                    <div id="levo">
                        <p>Kategorija:</p>
                        <?php ListaKategorija(); ?>
                    </div>
                    <div id="desno">
                        <p>Podkategorija:</p>
                        <?php ListaKategorija(1); ?>
                    </div>
                    
                </div>
                <div id="desno">
                    <p>Istaknuto: </p>
                    <?php
                     if (isset($_GET['izmena']) && $cekirano) {
                        echo '<input type="checkbox" name="istaknuto" checked>';
                     } else {
                        echo ' <input type="checkbox" name="istaknuto">';
                     }
                    ?>
                    <p>Slika: </p>
                    <input type="file" name="slika">
                </div>
                
                <p>Tekst objave</p>
                <textarea id="" cols="30" rows="10" name="tekstObjave"><?php echo $textValue?></textarea>
                <input type="submit" value="Potvrdi">
            </form>
        </div>
    </main>
</body>
</html>