<?php 

$id = $_GET["id"] ?? "";

?>
<h2>Quitar admin?</h2>
<a href="procesar/quitar_admin.php?id=<?= $id ?>">Si</a>
<a href="index.php?pagina=usuarios">No</a>
