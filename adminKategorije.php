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
            <h2>Pregled kategorija</h2>
            
            <div class="lista-kategorija">
            <p>Dodaj novu kategoriju</p>
            <form action="Redcoder/unosKategorije.php" method='post'>
                <input type="text" name='naziv'>
                <button type="submit">Potvrdi dodavanje</button>
            </form>
            
           <?php
                $sql = "SELECT kategorija.id, kategorija.naziv, COUNT(objava.naslov) AS broj 
                        FROM `kategorija` LEFT JOIN `objava` ON kategorija.id = objava.id_kategorije 
                        GROUP BY kategorija.naziv ORDER BY kategorija.id;";
                
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    echo "<table id='kategorije-tabela'>";
                    echo "<thead>
                            <tr>
                                <th>Naziv kategorije</th>
                                <th>Br. objava</th>
                                <th> </th>
                            </tr>
                          </thead>
                        <tbody>";
                    while($row = $result->fetch_assoc()) {
                        $id = $row['id'];
                        echo "<tr>
                                <td>". $row["naziv"]."</td>
                                <td>". $row["broj"]."</td>
                                <td> <a class='brisanje' href='Redcoder/brisanjeKategorije.php?id=$id'>Obrisi</a></td>
                            </tr>"; 
                        }
                        echo "</tbody></table>";
                } else {
                    echo "0 results";
                }
                ?>
            </div>
            <div class="lista-kategorija">
            <p>Dodaj novu podkategoriju</p>
            <form action="Redcoder/unosPodKategorije.php" method='post'>
                <input type="text" name='naziv'>
                <button type="submit">Potvrdi dodavanje</button>
            </form>
            <?php
                $sql = "SELECT podkategorija.id, podkategorija.naziv, COUNT(objava.naslov) AS broj 
                FROM `podkategorija` LEFT JOIN `objava` ON podkategorija.id = objava.id_podkategorije 
                GROUP BY podkategorija.naziv ORDER BY podkategorija.id;";
        
                $result = $conn->query($sql);
            
                if ($result->num_rows > 0) {
                    echo "<table id='kategorije-tabela'>";
                    echo "<thead>
                            <tr>
                                <th>Naziv podkategorije</th>
                                <th>Br. objava</th>
                                <th> </th>
                            </tr>
                        </thead>
                        <tbody>";
                    while($row = $result->fetch_assoc()) {
                        $id = $row['id'];
                        echo "<tr>
                                <td>". $row["naziv"]."</td>
                                <td>". $row["broj"]."</td>
                                <td> <a class='brisanje' href='Redcoder/brisanjePodKategorije.php?id=$id'>Obrisi</a></td>
                            </tr>"; 
                        }
                        echo "</tbody></table>";
                } else {
                    echo "0 results";
                }
                $conn->close();
           ?>
           </div>
        </div>
    </main>
</body>
</html>