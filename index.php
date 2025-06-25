<?php
session_start();
$page = $_GET["page"] ?? "home"; 
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>PixelPartners</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet">
	<link href="assets/css/styles.css" rel="stylesheet">
</head>
<body>
	<?php include_once "header.php" ?>

	<main>
		<?php 
			if (file_exists("views/$page.php")) {
				include "views/$page.php";
			} else {
				include "views/404.php";
			}  
		?>
	</main>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.bundle.min.js"></script>
</body>

<?php include('footer.php'); ?>