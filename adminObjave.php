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
            <h2>Prikaz Objava</h2>
            <p>Pronadjite objavu</p>
            <form action="RedCoder/adminPretraga.php" method="post">
                <input type="text" name='termin'>
                <button type="submit">Pretraži</button>
            </form>
            <a href="adminUnosObjave.php" id='dodaj'>Dodaj novu objavu</a>
            
            <?php
                $zaPretragu = "";

                if(isset($_GET['search'])) {
                    $zaPretragu = $_GET['search'];
                }

                $sql = "SELECT objava.naslov, objava.id, kategorija.naziv, COUNT(komentar.id) AS broj 
                        FROM objava
                        LEFT JOIN kategorija ON kategorija.id = objava.id_kategorije 
                        LEFT JOIN komentar ON objava.id = komentar.id_objave 
                        WHERE objava.naslov LIKE '%$zaPretragu%'
                        GROUP BY objava.naslov
                        ORDER BY objava.id DESC;";

                $result = $conn->query($sql);
            
                if ($result->num_rows > 0) {
                    // output data of each row
                    echo "<table>";
                    echo "<thead>
                            <tr><th>Naslov objave</th><th>Br. komentara</th><th>Kategorija</th><th colspan='2'></th></tr>
                         </thead>
                         <tbody>";
                    while($row = $result->fetch_assoc()) {
                    echo "<tr>
                            <td>". $row["naslov"]."</td>
                            <td>". $row["broj"]."</td>
                            <td>". $row["naziv"]."</td>
                            <td><a class='izmena' href='adminUnosObjave.php?izmena=da&id=".$row["id"]."'>izmeni</a></td>
                            <td><a class='brisanje' href='Redcoder/brisanjeObjave.php?id=".$row["id"]."'>obrisi</a></td>
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