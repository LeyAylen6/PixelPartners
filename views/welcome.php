<?php
$username = $_SESSION["user"]["name"];
?>

<section class="container my-5">
    <div class="row justify-content-center h-100 align-items-center">
        <div class="col-md-8 col-lg-6 shadow card text-center p-5">
            <h2 class="mb-5">Hola <?php echo $username; ?>!</h2>
            <img src="assets/img/welcome.svg" alt="Bienvenido/a" class="img-fluid col-10 mx-auto">
            <p class="lead pt-4">Has iniciado sesión correctamente.</p>
            <a href="index.php?page=profile-edit" class="btn btn-outline-primary m-2">Editar mis datos</a>
        </div>
    </div>
</section>
