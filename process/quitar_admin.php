<?php 
require_once '../class/db/mysqli.php';
require_once '../class/Usuario.php';

$id = $_GET["id"] ?? "";

try {
    (new Usuario())->quitarAdmin($conexion, $id);
    header("Location: ../index.php?pagina=usuarios");
} catch (Exception $e) {
    header("Location: ../index.php?pagina=usuarios&error=1");
    // throw $e;
}

?>