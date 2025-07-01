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
    
    <?php if ($_GET["error"]) { 
      include_once 'error-modal.php'; 
    } ?> 

    <?php if ($_GET["message"]) { 
      include_once 'success-modal.php'; 
    } ?> 

    <form 
      id="new-user-projects" 
      action="process/post-user-projects.php" 
      method="POST" 
      class="needs-validation" 
      novalidate
    >

      <?php foreach ($new_project_fields as $field): ?>
        <?php if ($field['type'] === 'textarea'): ?>
          <div class="mb-4">
            <label for="<?= $field['id'] ?>" class="form-label fw-semibold">
              <?= $field['label'] ?>
            </label>
            <textarea 
              class="form-control" 
              id="<?= $field['id'] ?>" 
              name="<?= $field['name'] ?>" 
              placeholder="<?= $field['placeholder'] ?>"
              rows="2" 
              required 
            ></textarea>
            <div class="invalid-feedback">
              <?= $field['error_message'] ?>
            </div>
          </div>

        <?php else: ?>
          <div class="mb-4">
            <label for="<?= $field['id'] ?>" class="form-label fw-semibold">
              <?= $field['label'] ?>
            </label>
            <div class="input-group">
              <?php if ($field['type'] === 'url'): ?> 
                <span class="input-group-text">https://</span>
              <?php endif; ?>
              <input 
                type="<?= $field['type']?>" 
                class="form-control form-control-lg" 
                id="<?= $field['id'] ?>" 
                name="<?= $field['name']?>" 
                placeholder="<?= $field['placeholder']?>"
                required 
              >
            </div>
            <div class="invalid-feedback">
              <?= $field['error_message'] ?>
            </div>
          </div>
        <?php endif; ?>
      <?php endforeach; ?>

      <button 
        type="submit" 
        class="btn btn-primary btn-lg text-white w-100" 
      >
        <i class="bi bi-send me-2"></i>Guardar Proyecto
      </button>
    </form>
  </article>
</section>