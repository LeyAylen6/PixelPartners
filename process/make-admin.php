<?php 
require_once '../class/db/mysqli.php';
require_once '../class/User.php';

$id = $_GET["id"] ?? "";

try {
    (new User())->makeAdmin($connection, $id);
    header("Location: ../index.php?page=admin-users");
} catch (Exception $e) {
    header("Location: ../index.php?page=admin-users");
    throw $e;
}

?>