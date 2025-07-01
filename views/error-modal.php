<div class="position-fixed top-0 start-0 w-100 h-100 d-flex align-items-center justify-content-center bg-blur">
  <div class="alert alert-danger show p-0 overflow-hidden shadow border-0 w-25">
    <div class="d-flex align-items-center p-3">
      <i class="bi bi-exclamation-triangle-fill text-danger bg-danger bg-opacity-10 py-2 px-3 rounded-circle me-3 fs-4"></i>
      <h3 class="fs-5 alert-heading fw-bold mb-0 text-danger">
        ¡Ups! Algo salió mal
      </h3>
    </div>
    <div class="bg-light p-3 d-flex align-items-end flex-column">
      <p class="mb-3 text-dark text-center w-100">
        <?= $_GET["error"] ?>
      </p>
      <a href="?page=admin-projects" class="btn btn-sm btn-outline-danger w-25 text-center">
        <i class="bi bi-x-lg me-1"></i> 
        Cerrar
      </a>
    </div>
  </div>
</div>