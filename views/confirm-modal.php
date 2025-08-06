<?php

$action = $_GET['action'];
$message = $_GET['message'];
$user_id = $_GET['id'];
$url = $action == "make-admin" ? "process/make-admin.php?id=" . $user_id : "process/delete-project.php?id=" . $user_id;
$url_to_return = $action == "make-admin" ? "index.php?page=admin-users" : "index.php?page=admin-projects";
?>

<div class="position-fixed top-0 start-0 w-100 h-100 d-flex align-items-center justify-content-center bg-blur">
    <div class="alert alert-danger show p-0 overflow-hidden shadow border-0 w-25">
        <div class="d-flex align-items-center p-3">
        <i class="bi bi-check-circle-fill text-primary bg-opacity-10 py-2 px-3 rounded-circle me-3 fs-1"></i>
        <h3 class="fs-5 alert-heading fw-bold mb-0 text-primary">
            <?= $message ?>
        </h3>
        </div>
        <div class="bg-light p-3 d-flex justify-content-evenly align-items-end">
            <a href="<?= $url ?>" class="btn mt-3 mb-2 btn-sm btn-outline-primary w-25 text-center">
                <i class="bi bi-check-lg me-1"></i> 
                Si
            </a>
            <a href="<?= $url_to_return ?>" class="btn mt-3 mb-2 btn-sm btn-outline-primary w-25 text-center">
                <i class="bi bi-x-lg me-1"></i> 
                No
            </a>
        </div>
    </div>
</div>