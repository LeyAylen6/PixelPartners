<section class="w-100 bg-primary-light d-flex align-items-center justify-content-center py-4">
  <article class="p-5 bg-white justify-content-center col-lg-5 col-xl-4 shadow rounded-4 border-0">
    <h2 class="title text-center mb-4">Solicita nuestros servicios</h1>
    <form action="" method="post" novalidate>
      <fieldset>
        <legend class="text-secondary">Información personal</legend>
        <div class="mb-4">
          <label for="nombre" class="form-label">Nombre completo</label>
          <input type="text" 
                  class="form-control form-control-lg" 
                  id="nombre" 
                  name="nombre" 
                  required 
                  placeholder="Tu nombre completo"
                  aria-label="Tu nombre completo">
        </div>
        <div class="mb-4">
          <label for="email" class="form-label">Correo electrónico</label>
          <input type="email" 
                  class="form-control form-control-lg" 
                  id="email" 
                  name="email" 
                  required 
                  placeholder="tu@email.com"
                  aria-label="Tu correo electrónico">
        </div>
        <div class="mb-4">
          <label for="motivo" class="form-label">Motivo de contacto</label>
          <select class="form-select form-select-lg" id="motivo" name="motivo" required aria-label="Motivo de contacto">
            <option value="" disabled selected>Selecciona un motivo</option>
            <option value="consulta">Consulta</option>
            <option value="soporte">Soporte</option>
            <option value="sugerencia">Sugerencia</option>
            <option value="otro">Otro</option>
          </select>
        </div>
      </fieldset>
      <fieldset>
        <legend class="text-secondary">Mensaje</legend>
        <div class="mb-4">
          <label for="mensaje" class="form-label">Mensaje</label>
          <textarea class="form-control form-control-lg" 
                    id="mensaje" 
                    name="mensaje" 
                    rows="2" 
                    required 
                    placeholder="Escribe tu mensaje aquí"
                    aria-label="Escribe tu mensaje aquí"></textarea>


        </div>
      </fieldset>

      <div class="d-grid">
        <button type="submit" 
                class="btn btn-primary btn-lg text-white" 
                style="background-color: #6c5ce7; border: none;"
                aria-label="Enviar formulario de contacto">
          <i class="bi bi-send me-2"></i>Enviar mensaje
        </button>
      </div>
    </form>
  </article>
</section>