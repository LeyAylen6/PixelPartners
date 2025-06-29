<?php 
    $server = "localhost";
    $user = "root";
    $password = "";
    $dbname = "parcial_2";

    mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
    
    try {
        $connection = new mysqli($server, $user, $password, $dbname);
        $connection->set_charset("utf8mb4");
    } catch (Exception $e) {
        header("Location: index.php?page=500");
    }
?>