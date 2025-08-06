<?php 
require_once '../class/db/mysqli.php';
require_once '../class/Project.php';

$id = $_GET["id"] ?? "";

try {
    ( new Project() )->delete($connection, $id);
    header("Location: ../index.php?page=admin-projects");
} catch (Exception $e) {
   throw $e;
}

?>