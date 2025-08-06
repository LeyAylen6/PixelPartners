<div class="container mt-5">
  <div class="row justify-content-center">
    <div class="col-md-6 col-lg-5">
      <h2 class="mb-4 text-center">Iniciar Sesión</h2>

      <?php if (isset($_GET["error"])) { 
        include_once 'error-modal.php'; 
      } ?> 

      <form method="POST" action="process/login-user.php" autocomplete="off">
        <fieldset>
          <div class="mb-4">
            <label for="email" class="form-label">Correo electrónico</label>
            <input 
              type="text" 
              class="form-control form-control-lg" 
              id="email" 
              name="email" 
              placeholder="Tu correo electrónico"
              aria-label="Correo electrónico">
          </div>
          <div class="mb-4">
            <label for="password" class="form-label">Contraseña</label>
            <input 
              type="password" 
              class="form-control form-control-lg" 
              id="password" 
              name="password" 
              placeholder="Contraseña"
              aria-label="Contraseña">
          </div>
        </fieldset>
        <div class="d-grid">
          <button type="submit" class="btn btn-primary btn-lg">Entrar</button>
        </div>
      </form>
    </div>
  </div>
</div>