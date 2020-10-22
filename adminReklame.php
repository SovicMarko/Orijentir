<?php 
        require 'RedCoder/adminNav.php';
        require 'RedCoder/conn.php';
?>   
   
   <main>
        <nav>
            <a href="">Podesavanja</a>
            <a href="RedCoder/logout.php">Odjava</a>
        </nav>
        <div id="container">
            <h2>Pregled reklama</h2>
            <?php 
                $sql = "SELECT * FROM reklama;";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    // output data of each row
                    echo "<table>";
                    echo "<thead><tr><th>Naziv</th><th>Pozicija</th><th></th></tr></thead><tbody>";
                    $pozicija = "";
                    while($row = $result->fetch_assoc()) {
                    switch ($row['pozicija']) {
                        case 1:
                            $pozicija = "Pocetna stranica";
                            break;
                        case 2:
                            $pozicija = "Stranice kategorija";
                            break;
                        case 3:
                            $pozicija = "Pojedinacne stranice";
                            break;
                        default:
                            break;
                    }
                    
                    echo "<tr><td>". $row["naziv"]."</td><td>".$pozicija."</td>
                    <td><a href='RedCoder/brisanjeReklame.php?id=".$row['id']."' class='brisanje'>
                    Obrisi</a></td></tr>"; 
                    }
                    echo "</tbody></table>";
                } else {
                    echo "0 results";
                }
                $conn->close();


            ?>
            <h2>Nova reklama</h2>
            <form action="Redcoder/unosReklame.php" method='post' enctype='multipart/form-data'>
                <p>Naziv oglasivaca:</p>
                <input type="text" name="naziv">
                <p>Izaberite sliku:</p>
                <input type="file" name="slika">
                <p>Izaberite poziciju reklame</p>
                <input type="radio" name='pozicija' value='1'> Prikaz na pocetnoj <br>
                <input type="radio" name='pozicija' value='2'> Prikaz na stranicama kategorija <br>
                <input type="radio" name='pozicija' value='3'> Prikaz na stranicama pojedinacnih objava <br>
                <input type="submit" value="Potvrdi">
            </form>
        </div>
    </main>
</body>
</html>