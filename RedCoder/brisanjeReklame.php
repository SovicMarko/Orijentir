<?php
    require 'conn.php';
    $id = $_GET['id'];
    echo $id;
    $sql = "SELECT * FROM `reklama` WHERE id=$id;";
    mysqli_query($conn,$sql);
    $result = $conn->query($sql);
        $row = $result->fetch_assoc();
        $img = $row['slika'];
        unlink("img/$img");

    $sql = "DELETE FROM `reklama` WHERE id=$id;";
    mysqli_query($conn,$sql);
    header("Location: ../adminReklame.php?delete=success");