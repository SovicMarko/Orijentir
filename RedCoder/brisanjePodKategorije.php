<?php
    require 'conn.php';
    $id = $_GET['id'];
    echo $id;
    $sql = "DELETE FROM `podkategorija` WHERE id=$id;";
    mysqli_query($conn,$sql);
    header("Location: ../adminKategorije.php?delete=success");
