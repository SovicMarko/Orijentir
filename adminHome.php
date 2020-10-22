
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
            <h2>Pocetna stranica admin-dela aplikacije</h2>
            <p>Pronadjite objavu</p>
            <form action="RedCoder/adminPretraga.php" method="post">
                <input type="text" name='termin'>
                <button type="submit">Pretraži</button>
            </form>
            <a href="adminUnosObjave.php" id='dodaj'>Dodaj novu objavu</a>
            <br>
            <div id="counters">
                <div class="counter">
                    <header>
                        Broj Kategorija
                    </header>
                    <main>
                    <?php
                        $sql = "SELECT COUNT(kategorija.naziv) as broj FROM `kategorija` ;";
 
                        $result = $conn->query($sql);
             
                        if ($result->num_rows > 0) {
                            while($row = $result->fetch_assoc()) {
                            echo $row['broj']; 
                        }
                        } else {
                            echo "0 results";
                        }
                    ?>
                    </main>
                </div>
                <div class="counter">
                    <header>
                        Ukupno Objava
                    </header>
                    <main>
                    <?php
                        $sql = "SELECT COUNT(objava.id) as broj FROM `objava` ;";
 
                        $result = $conn->query($sql);
             
                        if ($result->num_rows > 0) {
                            while($row = $result->fetch_assoc()) {
                            echo $row['broj']; 
                        }
                        } else {
                            echo "0 results";
                        }
                    ?>
                    </main>
                </div>
                <div class="counter">
                    <header>
                        Ukupno Korisnika
                    </header>
                    <main>
                        <?php
                            $sql = "SELECT COUNT(klijent.id) as broj FROM `klijent` ;";
    
                            $result = $conn->query($sql);
                
                            if ($result->num_rows > 0) {
                                while($row = $result->fetch_assoc()) {
                                echo $row['broj']; 
                            }
                            } else {
                                echo "0 results";
                            }
                        ?>
                    </main>
                </div>
            </div>
            <?php

                $sql = "SELECT objava.naslov, objava.id, kategorija.naziv 
                        FROM objava
                        LEFT JOIN kategorija ON kategorija.id = objava.id_kategorije 
                        ORDER BY objava.id DESC;";

                $result = $conn->query($sql);
            
                if ($result->num_rows > 0) {
                    // output data of each row
                    echo "<table>";
                    echo "<thead>
                            <tr><th>Naslov objave</th><th>Kategorija</th></tr>
                         </thead>
                         <tbody>";
                    while($row = $result->fetch_assoc()) {
                    echo "<tr>
                            <td>". $row["naslov"]."</td>
                            <td>". $row["naziv"]."</td>
                         </tr>";
                    }
                    echo "</tbody>
                        </table>";
                } else {
                    echo "0 results";
                }
                $conn->close();
           ?>
        </div>

    </main>

</body>
</html>