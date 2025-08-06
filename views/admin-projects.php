<?php
include_once 'class/Project.php';
include_once 'class/db/mysqli.php';

$project = new Project();
$projects = $project->findAll($connection);


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
    <?php if (isset($_GET["action"])) { 
        include_once 'confirm-modal.php'; 
    } ?> 

    <?php if (isset($_GET["error"])) { 
      include_once 'error-modal.php'; 
    } ?> 

    <article class="p-0 m-0 my-5 row justify-content-center">
        <div class="col-11 card shadow p-4">
            <h2 class="text-center">Gestión de proyectos</h2>
            <div class="d-flex justify-content-end mb-3">
                <a 
                    href="index.php?page=project-form&action=new" 
                    class="btn btn-primary btn-md"  
                >
                    <i class="bi bi-plus-circle me-2"></i>
                    Nuevo Proyecto
                </a>
            </div>
            <div class="table-responsive">
                <table class="table table-bordered table-hover align-middle">
                    <thead class="table-light">
                        <tr>
                            <th>Proyecto</th>
                            <th>Descripción</th>
                            <th>Enlace</th>
                            <th>Compañía</th>
                            <th>Acción</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($projects as $project): ?>
                            <tr>
                                <td>
                                    <img src="<?= $project->image ?>" alt="<?= $project->name ?>" class="img-fluid" width="300">
                                    <p class="text-center pt-2"><strong><?= $project->name ?></strong></p>
                                </td>
                                <td><?= $project->description ?></td>
                                <td>
                                    <a href="<?= $project->link ?>" class="btn btn-primary btn-md" target="_blank">
                                        <i class="bi bi-link"></i>
                                        Ver Proyecto
                                    </a>
                                </td>
                                <td class="text-center">
                                    <?php if ($project->company_logo): ?>
                                        <img src="<?= $project->company_logo ?>" alt="<?= $project->name ?>" class="img-fluid" width="100">
                                    <?php else: ?>
                                        <p>No está asociado a ninguna compañía</p>
                                    <?php endif; ?>
                                </td>
                                <td class="d-flex gap-2">
                                    <a 
                                        class="btn btn-md btn-success" 
                                        href="index.php?page=project-form&action=update&id=<?= $project->id ?>"
                                        >
                                        Editar
                                    </a>
                                    <a 
                                        class="btn btn-md btn-danger"
                                        href="index.php?page=admin-projects&action=delete&id=<?= $project->id ?>&message=Esta seguro que desea eliminar el proyecto?"
                                        >
                                        Eliminar
                                    </a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </article>
</section>
