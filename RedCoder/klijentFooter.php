<div id="footer">
    <div id="dunno">
        <?php 
            require 'conn.php';
            $sql = "SELECT * FROM `kategorija`";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                // output data of each row
                echo "<ul>";
                while($row = $result->fetch_assoc()) {
                    echo "<a href='klijentKategorija.php?kategorija=".$row['id']."'><li>".$row['naziv']."</li></a>";
                }
                echo "</ul>";
            } else {
                echo "0 results";
            }
            $conn->close();
        ?>
        <ul>
        <?php
             if(isset($_SESSION['k_id'])) {
                echo '<a href="klijentProfilna.php"><li>'.$_SESSION['k_ime'].'</li></a>';
                echo '<a href="RedCoder/logout.php"><li>Odjava</li></a>';
            } else {
                echo '<a href="../registracija.php"><li>Registracija</li></a>';
                echo '<a href="../prijava.php"><li>Prijava</li></a>';
            }
         ?>
        </ul>

        <div id="verzijaSajta"> 
            <p>Orijentir, web magazin - casopis teorijske prakse</p>

            <i>ispitni projekat</i>

            <h4>PRIMENJENE BAZE PODATAKA</h4>

            <table>
                <tr>
                    <th>Student</th>
                    <th> </th>
                    <th>Mentor</th>
                    
                </tr>
                <tr>
                    <td>Marko Šović IT 153/17</td>
                    <td> </td>
                    <td>Slaviša Svitlica</td>
                </tr>
            </table>

          


        </div>
        <img src="RedCoder/img/logoF.png" alt="">
    </div>
</div>
</div>
    <div id="master-footer">
      <p>© 2019 Orijentir magazin - RedCoder</p>
    </div>
    </body>
</html>
