<section class="d-flex align-items-center justify-content-center py-5" style="min-height: 100vh; background: linear-gradient(120deg, #ede9fe 0%, #f3e8ff 100%);">
  <article class="p-5 rounded-4 shadow-lg bg-white border border-3 border-primary" style="max-width: 800px; width: 100%; margin: 2rem auto;">
    <h1 class="display-5 fw-bold text-primary mb-4 text-center">Administrar Proyectos</h1>
    <form id="project-form" class="needs-validation" novalidate>
      <!-- Nombre del Proyecto -->
      <div class="mb-4">
        <label for="name" class="form-label fw-semibold">Nombre del Proyecto</label>
        <input type="text" class="form-control form-control-lg" id="name" name="name" required placeholder="Ingrese el nombre del proyecto">
        <div class="invalid-feedback">
          Por favor ingrese un nombre para el proyecto.
        </div>
      </div>

      <div class="mb-4">
        <label for="description" class="form-label fw-semibold">Descripción</label>
        <textarea class="form-control" id="description" name="description" rows="4" required placeholder="Descripción detallada del proyecto"></textarea>
        <div class="invalid-feedback">
          Por favor ingrese una descripción para el proyecto.
        </div>
      </div>

      <div class="mb-4">
        <label for="image" class="form-label fw-semibold">Imagen del Proyecto</label>
        <input class="form-control" type="file" id="image" name="image" accept="image/*" required>
        <div class="form-text">Seleccione una imagen que represente el proyecto.</div>
        <div class="invalid-feedback">
          Por favor seleccione una imagen para el proyecto.
        </div>
      </div>

      <div class="mb-4">
        <label for="link" class="form-label fw-semibold">Enlace al Proyecto</label>
        <div class="input-group">
          <span class="input-group-text">https://</span>
          <input type="url" class="form-control" id="link" name="link" placeholder="ejemplo.com/proyecto" required>
        </div>
        <div class="invalid-feedback">
          Por favor ingrese un enlace válido para el proyecto.
        </div>
      </div>

      <div class="mb-4">
        <label class="form-label fw-semibold">Desarrolladores</label>
        <div class="dropdown">
          <button class="form-select text-start position-relative" type="button" id="developersDropdown" data-bs-toggle="dropdown" aria-expanded="false">
            <span id="developers-selected-text">Seleccionar desarrolladores</span>
            <input type="hidden" name="developers" id="developers-input" required>
          </button>
          <div class="dropdown-menu w-100 p-2" style="max-height: 250px; overflow-y: auto;">
            <div class="form-check mb-1">
              <input class="form-check-input developer-checkbox" type="checkbox" value="Juan Pérez" id="dev1">
              <label class="form-check-label w-100" for="dev1">
                Juan Pérez
              </label>
            </div>
            <div class="form-check mb-1">
              <input class="form-check-input developer-checkbox" type="checkbox" value="María Gómez" id="dev2">
              <label class="form-check-label w-100" for="dev2">
                María Gómez
              </label>
            </div>
            <div class="form-check mb-1">
              <input class="form-check-input developer-checkbox" type="checkbox" value="Carlos Rodríguez" id="dev3">
              <label class="form-check-label w-100" for="dev3">
                Carlos Rodríguez
              </label>
            </div>
            <div class="form-check mb-1">
              <input class="form-check-input developer-checkbox" type="checkbox" value="Ana López" id="dev4">
              <label class="form-check-label w-100" for="dev4">
                Ana López
              </label>
            </div>
            <div class="form-check mb-1">
              <input class="form-check-input developer-checkbox" type="checkbox" value="Pedro Sánchez" id="dev5">
              <label class="form-check-label w-100" for="dev5">
                Pedro Sánchez
              </label>
            </div>
            <div class="form-check mb-1">
              <input class="form-check-input developer-checkbox" type="checkbox" value="Laura Fernández" id="dev6">
              <label class="form-check-label w-100" for="dev6">
                Laura Fernández
              </label>
            </div>
            <div class="form-check mb-1">
              <input class="form-check-input developer-checkbox" type="checkbox" value="Diego Martínez" id="dev7">
              <label class="form-check-label w-100" for="dev7">
                Diego Martínez
              </label>
            </div>
            <div class="form-check">
              <input class="form-check-input developer-checkbox" type="checkbox" value="Sofía Ramírez" id="dev8">
              <label class="form-check-label w-100" for="dev8">
                Sofía Ramírez
              </label>
            </div>
          </div>
        </div>
        <div class="invalid-feedback">
          Por favor seleccione al menos un desarrollador.
        </div>
      </div>
      
      <style>
      /* Estilos para el dropdown personalizado */
      .dropdown-menu {
        padding: 0.5rem;
      }
      .form-check {
        padding: 0.25rem 1rem;
        margin: 0;
      }
      .form-check:hover {
        background-color: #f8f9fa;
      }
      .form-check-input:checked {
        background-color: #0d6efd;
        border-color: #0d6efd;
      }
      #developersDropdown::after {
        position: absolute;
        right: 1rem;
        top: 50%;
        transform: translateY(-50%);
      }
      /* Evitar que el dropdown se cierre al hacer clic dentro */
      .dropdown-menu {
        pointer-events: auto;
      }
      </style>

      <!-- Botón de envío -->
      <div class="d-grid gap-2 d-md-flex justify-content-md-end mt-4">
        <button type="reset" class="btn btn-outline-secondary me-md-2">Limpiar</button>
        <button type="submit" class="btn btn-primary">Guardar Proyecto</button>
      </div>
    </form>
  </article>
</section>