<section class="container my-5">
  <div class="row justify-content-center">
    <div class="col-md-7 col-lg-6 shadow p-4 rounded-4">
        <h2 class="mb-4 text-center">Editar mis datos</h2>

        <?php if (isset($_GET["error"])) { 
            include_once 'error-modal.php'; 
        } ?> 

        <?php if (isset($_GET["message"])) { 
            include_once 'success-modal.php'; 
        } ?>

        <form method="POST" action="process/update-user.php?id=<?= $_SESSION['user']['id'] ?>">
            <fieldset>
                <div class="mb-4">
                    <label for="name" class="form-label">Nombre completo</label>
                    <input 
                        type="text" 
                        class="form-control form-control-lg" 
                        id="name" 
                        name="name" 
                        placeholder="Tu nombre completo" 
                        value="<?= $_SESSION['user']['name'] ?>"
                    />
                </div>
                <div class="mb-4">
                    <label for="email" class="form-label">Correo electrónico</label>
                    <input 
                        type="email" 
                        class="form-control form-control-lg" 
                        id="email" 
                        name="email" 
                        placeholder="Tu correo electrónico" 
                        value="<?= $_SESSION['user']['email'] ?>"
                    />
                </div>
                <div class="mb-4">
                    <label for="password" class="form-label">Nueva contraseña</label>
                    <input 
                        type="password" 
                        class="form-control form-control-lg" 
                        id="password" 
                        name="password" 
                        placeholder="*******************"
                    />
                </div>
                <div class="mb-4">
                    <label for="confirm_password" class="form-label">Repetir nueva contraseña</label>
                    <input 
                        type="password" 
                        class="form-control form-control-lg" 
                        id="confirm_password" 
                        name="confirm_password"   
                        placeholder="*******************"
                    />
                </div>
            </fieldset>
            <div class="d-grid">
                <button type="submit" class="btn btn-primary btn-lg">Guardar cambios</button>
            </div>
        </form>
    </div>
  </div>
</section>
