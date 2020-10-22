<?php
    require 'conn.php';
    $id = $_GET['id'];
    echo $id;
    $sql = "SELECT * FROM `objava` WHERE id=$id;";
    mysqli_query($conn,$sql);
    $result = $conn->query($sql);
        $row = $result->fetch_assoc();
        $img = $row['slika'];
        unlink("img/$img");
    $sql = "DELETE FROM `objava` WHERE id=$id;";
    mysqli_query($conn,$sql);
    header("Location: ../adminObjave.php?delete=success");