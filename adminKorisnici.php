<!DOCTYPE html>
<html lang="en">
<head>

</head>
<body>
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
            <h2>Pregled Korisnika</h2>
            <!-- <p>Pronadjite proizvod, alat ili oglas</p>
            <input type="text">
            <input type="button" value="Dodaj novi oglas"> -->
        <?php 
            $sql = "SELECT ime, prezime, email FROM klijent;";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                // output data of each row
                echo "<table>";
                echo "<thead><tr><th>Ime</th><th>Prezime</th><th>email</th></tr></thead><tbody>";
                while($row = $result->fetch_assoc()) {
                echo "<tr><td>". $row["ime"]."</td><td>".$row["prezime"]."</td><td>".$row["email"]."</td></tr>"; 
                }
                echo "</tbody></table>";
            } else {
                echo "0 results";
            }
            $conn->close();


        ?>
            
           

</body>
</html>