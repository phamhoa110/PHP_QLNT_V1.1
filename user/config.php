<?php
    $host = "localhost";
    $un = "root";
    $up = "";
    $dbn = "quanlynoithat";

    $conn = mysqli_connect($host, $un, $up, $dbn);
    if(!$conn){
        die("Loi".mysqli_connect_error());
    }
?>