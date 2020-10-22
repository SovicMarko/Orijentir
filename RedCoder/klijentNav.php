<div id="main">
<div id="nav-bar">
<?php
        require 'conn.php';

        $sql = "SELECT naziv, id FROM kategorija;";
        $result = $conn->query($sql);

        $sirina = (100 / intval($result->num_rows)) . '%';
        
        if ($result->num_rows > 0) {
            // output data of each row
            echo "<ul>";
            while($row = $result->fetch_assoc()) {
            echo "<li style='width: $sirina'><a href='klijentKategorija.php?kategorija=".$row['id']."'><p>".$row['naziv']."</p></a></li>"; 
            }
            echo "</ul>";
        } else {
            echo "0 results";
        }
        // $conn->close();
        echo '<ul id="podkategorije">';
        $sql = "SELECT naziv, id FROM podkategorija;";
        $result = $conn->query($sql);
        
        $sirina = (100 / intval($result->num_rows)) . '%';
        if ($result->num_rows > 0) {
            // output data of each row
            while($row = $result->fetch_assoc()) {
            echo "<li style='width: $sirina'><a href='klijentKategorija.php?podkategorija=".$row['id']."'>".$row['naziv']."</a></li>"; 
            }
        } else {
            echo "0 results";
        }
        echo '</ul>';
        ?>
       
    </div>
