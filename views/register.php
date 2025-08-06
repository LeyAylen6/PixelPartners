

<section class="container my-5">
    <div class="row justify-content-center">
        <div class="card shadow col-md-6 col-lg-5 p-5 border-0">
            <h2 class="mb-4 text-center">Registro de Usuario</h2>
            
            <?php if (isset($_GET["message"])) { 
                include_once 'success-modal.php'; 
            } ?> 

            <?php if (isset($_GET["error"])) { 
                include_once 'error-modal.php'; 
            } ?> 
      
            <form method="POST" action="process/register.php" autocomplete="off">
                <fieldset>
                    <div class="mb-4">
                        <label for="name" class="form-label">Nombre completo</label>
                        <input 
                        type="text" 
                        class="form-control form-control-lg" 
                        id="name" 
                        name="name"               
                        placeholder="Tu nombre completo"
                        aria-label="Tu nombre completo">
                    </div>
                    <div class="mb-4">
                        <label for="email" class="form-label">Email</label>
                        <input 
                        type="text" 
                        class="form-control form-control-lg" 
                        id="email" 
                        name="email"               
                        placeholder="Tu email"
                        aria-label="Email">
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
                    <div class="mb-4">
                        <label for="confirm_password" class="form-label">Repetir contraseña</label>
                        <input 
                        type="password" 
                        class="form-control form-control-lg" 
                        id="confirm_password" 
                        name="confirm_password"               
                        placeholder="Repite tu contraseña"
                        aria-label="Repetir contraseña">
                    </div>
                </fieldset>
                <div class="d-grid">
                    <button type="submit" class="btn btn-primary btn-lg">Registrarse</button>
                </div>
            </form>
        </div>
    </div>
</section>