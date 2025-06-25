<main class="contacto d-flex align-items-center justify-content-center" style="min-height: calc(100vh - 110px); height: calc(100vh - 110px); overflow: hidden; background: linear-gradient(120deg, #ede9fe 0%, #f3e8ff 100%); padding-top: 0; padding-bottom: 0;">

  <div class="container">
    <div class="row justify-content-center">
      <div class="col-lg-10 col-xl-8">
        <article class="card shadow rounded-4 border-0" style="max-height: none; overflow: visible; background: #fff; border: 2px solid #a78bfa;">
          <div class="card-body p-5" style="overflow: visible;">
            <h1 class="text-center mb-4">Solicita nuestros servicios</h1>
            <form action="send.php" method="post" class="needs-validation" novalidate>
              <fieldset>
                <legend>Información personal</legend>
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
                <legend>Mensaje</legend>
                <div class="mb-4">
                  <label for="mensaje" class="form-label">Mensaje</label>
                  <textarea class="form-control form-control-lg" 
                            id="mensaje" 
                            name="mensaje" 
                            rows="5" 
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
          </div>
        </article>
      </div>
    </div>
  </div>
</main>