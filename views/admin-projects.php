<?php
$new_project_fields = [
    [
        'name' => 'name',
        'type' => 'text',
        'id' => 'name',
        'label' => 'Nombre del Proyecto',
        'placeholder' => 'Ingrese el nombre del proyecto',
        'error_message' => 'Ingrese un nombre para el proyecto'
    ],
    [
        'name' => 'description',
        'type' => 'textarea',
        'id' => 'description',
        'label' => 'Descripción',
        'placeholder' => 'Ingrese la descripción del proyecto',
        'error_message' => 'Ingrese una descripción para el proyecto'
    ],
    [
        'name' => 'image',
        'type' => 'url',
        'id' => 'image',
        'label' => 'Imagen del Proyecto',
        'placeholder' => 'Ingrese la URL de la imagen del proyecto',
        'error_message' => 'Ingrese una imagen para el proyecto'
    ],
    [
        'name' => 'link',
        'type' => 'url',
        'id' => 'link',
        'label' => 'Enlace al Proyecto',
        'placeholder' => 'Ingrese el enlace al proyecto',
        'error_message' => 'Ingrese un enlace para el proyecto'
    ],
    [
        'name' => 'developers',
        'type' => 'text',
        'id' => 'developers',
        'label' => 'Desarrolladores',
        'placeholder' => 'Ingrese los nombres separados por comas',
        'error_message' => 'Ingrese al menos un desarrollador.'
    ]
];

?>

<section class="w-100 bg-primary-light d-flex align-items-center justify-content-center py-4">
  <article class="p-5 bg-white justify-content-center col-lg-5 col-xl-4 shadow rounded-4 border-0">
    <h2 class="title text-center mb-4">Nuevo proyecto destacado</h2>
    
    <?php if (isset($_GET["error"])) { 
      include_once 'error-modal.php'; 
    } ?> 

    <?php if (isset($_GET["message"])) { 
      include_once 'success-modal.php'; 
    } ?> 

    <form 
      id="new-user-projects" 
      action="process/post-user-projects.php" 
      method="POST" 
      novalidate
    >
      
        <div class="mb-4">
      <label for="name" class="form-label fw-semibold">Nombre del Proyecto</label>
      <input 
          type="text" 
          class="form-control form-control-lg" 
          id="name" 
          name="name" 
          placeholder="Nombre del proyecto"
          required
      >
      <div class="invalid-feedback">
          Por favor ingresa un nombre para el proyecto.
      </div>
    </div>

    <div class="mb-4">
      <label for="description" class="form-label fw-semibold">Descripción</label>
      <textarea 
          class="form-control" 
          id="description" 
          name="description" 
          rows="3" 
          placeholder="Descripción del proyecto"
          required
      ></textarea>
      <div class="invalid-feedback">
          Por favor ingresa una descripción.
      </div>
    </div>

    <div class="mb-4">
      <label for="image" class="form-label fw-semibold">URL de la Imagen</label>
      <div class="input-group">
          <span class="input-group-text">https://</span>
          <input 
              type="url" 
              class="form-control form-control-lg" 
              id="image" 
              name="image" 
              placeholder="ejemplo.com/imagen.jpg"
              required
          >
      </div>
      <div class="invalid-feedback">
          Por favor ingresa una URL de imagen válida.
      </div>
    </div>

    <div class="mb-4">
      <label for="link" class="form-label fw-semibold">Enlace del Proyecto</label>
      <div class="input-group">
          <span class="input-group-text">https://</span>
          <input 
              type="url" 
              class="form-control form-control-lg" 
              id="link" 
              name="link" 
              placeholder="ejemplo.com/proyecto"
              required
          >
      </div>
      <div class="invalid-feedback">
          Por favor ingresa un enlace válido.
      </div>
    </div>

    <div class="mb-4">
        <label class="form-label fw-semibold">Desarrolladores</label>
    
        <div class="position-relative">
          <input type="checkbox" id="toggleDevelopers" class="d-none">
          <label for="toggleDevelopers" class="border rounded-2 p-2 d-flex">
            <span>Selecciona desarrolladores</span>
            <i class="bi bi-chevron-down ms-auto"></i>
          </label>
      
          <div class="border rounded-2 mt-1 p-2 bg-white position-absolute w-100" 
            style="max-height: 200px">
          <?php 
              include_once 'class/User.php';
              include_once 'class/db/mysqli.php';
              
              $user = new User();
              $developers = $user->findAll($connection);
              
              foreach ($developers as $developer): 
          ?>
              <div class="form-check">
                  <input 
                      class="form-check-input" 
                      type="checkbox" 
                      name="developers[]" 
                      id="dev_<?= $developer->id ?>" 
                      value="<?= $developer->name ?>">
                  <label class="form-check-label w-100" for="dev_<?= $developer->id ?>">
                      <?= $developer->name ?>
                  </label>
              </div>
          <?php endforeach; ?>
          </div>
      </div>  
      <div class="form-text">Haz clic para seleccionar opciones</div>
        <div class="invalid-feedback">
            Por favor selecciona al menos un desarrollador.
        </div>
      </div>

      <button 
      type="submit" 
      class="btn btn-primary btn-lg text-white w-100" 
      >
        <i class="bi bi-send me-2"></i>Guardar Proyecto
      </button>
    </form>
  </article>
</section>

<style>
#toggleDevelopers:not(:checked) + label + div {
    display: none !important;
}

#toggleDevelopers:checked + label + div {
    display: block !important;
}

/* Estilo para el botón cuando el menú está abierto */
#toggleDevelopers:checked + label {
    border-color: #86b7fe;
    box-shadow: 0 0 0 0.25rem rgba(13, 110, 253, 0.25);
}

/* Mejorar la apariencia de los checkboxes */
.form-check-input:checked {
    background-color: #0d6efd;
    border-color: #0d6efd;
}

/* Asegurar que el menú esté por encima de otros elementos */
.position-relative {
    z-index: 1;
}

/* Estilo para el ícono de flecha */
.bi-chevron-down {
    transition: transform 0.2s ease-in-out;
}

#toggleDevelopers:checked + label .bi-chevron-down {
    transform: rotate(180deg);
}
</style>