<section class="d-flex align-items-center justify-content-center" style="min-height: 70vh; background: linear-gradient(120deg, #ede9fe 0%, #f3e8ff 100%);">
  <article class="text-center p-5 rounded-4 shadow-lg bg-white border border-3 border-primary" style="max-width: 600px; margin:auto;">
    <h1 class="display-5 fw-bold text-primary mb-3">Trabajá con nosotros</h1>
    <form id="form-trabaja" class="mb-4">
      <div class="mb-3 text-start">
        <label for="nombre" class="form-label">Nombre completo</label>
        <input type="text" class="form-control" id="nombre" name="nombre" required placeholder="Tu nombre completo">
      </div>
      <div class="mb-3 text-start">
        <label for="email" class="form-label">Correo electrónico</label>
        <input type="email" class="form-control" id="email" name="email" required placeholder="tu@email.com">
      </div>
      <div class="mb-3 text-start">
        <label for="descripcion" class="form-label">Sobre vos</label>
        <textarea class="form-control" id="descripcion" name="descripcion" rows="3" required placeholder="Contanos sobre tu experiencia, intereses, etc."></textarea>
      </div>
      <div class="mb-3 text-start">
        <label for="proyecto" class="form-label">Proyecto</label>
        <div class="input-group">
          <input type="text" class="form-control" id="proyecto" placeholder="Nombre del proyecto o enlace">
          <button type="button" class="btn btn-outline-primary" id="agregar-proyecto">Agregar</button>
        </div>
      </div>
    </form>
    <div id="lista-proyectos" class="mb-4">
      <!-- Proyectos agregados se mostrarán aquí -->
    </div>
    <button type="submit" form="form-trabaja" class="btn btn-primary btn-lg">Enviar postulación</button>
  </article>
</section>
<script>
// Manejo de proyectos locales
const proyectos = [];
const inputProyecto = document.getElementById('proyecto');
const btnAgregar = document.getElementById('agregar-proyecto');
const listaProyectos = document.getElementById('lista-proyectos');

function renderProyectos() {
  listaProyectos.innerHTML = '';
  if (proyectos.length > 0) {
    const ul = document.createElement('ul');
    ul.className = 'list-group mb-3';
    proyectos.forEach((p, i) => {
      const li = document.createElement('li');
      li.className = 'list-group-item';
      li.textContent = p;
      ul.appendChild(li);
    });
    listaProyectos.appendChild(ul);
  }
}

btnAgregar.addEventListener('click', function() {
  const val = inputProyecto.value.trim();
  if (val) {
    proyectos.unshift(val);
    renderProyectos();
    inputProyecto.value = '';
    inputProyecto.focus();
  }
});
</script>
