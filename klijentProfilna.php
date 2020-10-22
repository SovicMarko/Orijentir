<?php
    require 'RedCoder/conn.php';
    require 'RedCoder/klijentProfilnaHeader.php';
    
?>
<div id="main">
    <h1>Omiljene objave</h1>
    <div id="news">
        
        <?php
             $idKlijenta = $_SESSION['k_id'];
             $sql = "SELECT objava.naslov, objava.slika, objava.id FROM `objava`
             INNER JOIN omiljeno ON omiljeno.id_objave = objava.id
             WHERE omiljeno.id_klijenta =  $idKlijenta";
             $result = $conn->query($sql);
             if ($result->num_rows > 0) {
                 while($row = $result->fetch_assoc()) {
                    echo '<div class="omiljeno">
                            <div class="izlaz"><a href="RedCoder/brisanjeOmiljene.php?id='.$row['id'].'">X</a></div>
                            <img src="RedCoder/img/'.$row['slika'].'" alt="" srcset="">
                            <div><a href="klijentObjava.php?id='.$row['id'].'"><p>'.$row['naslov'].'</p></a></div>
                         </div>';
                 }
             } else {
                 echo "";
             }
             $conn->close();
          ?>
    

    </div>        
         
        <?php require 'RedCoder/klijentFooter.php'; ?>