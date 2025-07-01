<section class="w-100 bg-primary-light d-flex align-items-center justify-content-center py-4">
  <article class="p-5 bg-white justify-content-center col-lg-5 col-xl-4 shadow rounded-4 border-0">
    <h2 class="title text-center mb-4">Solicita nuestros servicios</h2>
    
    <?php if (isset($_GET["message"])) { 
      include_once 'success-modal.php'; 
    } ?> 

    <?php if (isset($_GET["error"])) { 
      include_once 'error-modal.php'; 
    } ?> 
    
    <form 
      action="process/send-emails.php" 
      method="POST" 
      novalidate
    >
      <fieldset>
        <legend class="text-secondary">Información personal</legend>
        <div class="mb-4">
          <label for="name" class="form-label">Nombre completo</label>
          <input 
            type="text" 
            class="form-control form-control-lg" 
            id="name" 
            name="name" 
            required 
            placeholder="Tu nombre completo"
            aria-label="Tu nombre completo">
        </div>
        <div class="mb-4">
          <label for="email" class="form-label">Correo electrónico</label>
          <input 
            type="email" 
            class="form-control form-control-lg" 
            id="email" 
            name="email" 
            required 
            placeholder="tu@email.com"
            aria-label="Tu correo electrónico">
        </div>
      </fieldset>
      <fieldset>
        <legend class="text-secondary">Mensaje</legend>
        <div class="mb-4">
          <label for="message" class="form-label">Contanos que servicio requieres</label>
          <textarea 
            class="form-control form-control-lg" 
            id="message" 
            name="message" 
            rows="2" 
            required 
            placeholder="Escribe el servicio que requieres"
            aria-label="Escribe el servicio que requieres"
          ></textarea>
        </div>
      </fieldset>

      <div class="d-grid">
        <button 
          type="submit" 
          class="btn btn-primary btn-lg text-white" 
          aria-label="Enviar formulario de contacto"
        >
          <i class="bi bi-send me-2"></i>
          Enviar solicitud
        </button>
      </div>
    </form>
  </article>
</section>