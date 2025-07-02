<?php
$services = [
    [
        'title' => 'Squads Especializados',
        'description' => 'Formamos equipos multidisciplinarios, adaptados a cada proyecto, que colaboran de manera ágil y transparente para lograr resultados sobresalientes y alineados con tus objetivos.',
        'icon' => 'bi-people-fill'
    ],
    [
        'title' => 'Staff IT Flexible',
        'description' => 'Sumamos desarrolladores y especialistas a tus equipos, ya sea para cubrir picos de demanda, proyectos puntuales o reforzar capacidades técnicas en el corto, mediano o largo plazo.',
        'icon' => 'bi-laptop'
    ],
    [
        'title' => 'Desarrollo de Software Personalizado',
        'description' => 'Diseñamos, desarrollamos y mantenemos soluciones tecnológicas a medida, desde la planificación hasta la puesta en producción, asegurando calidad y cumplimiento de objetivos.',
        'icon' => 'bi-code-square'
    ],
    [
        'title' => 'Automatización y QA',
        'description' => 'Implementamos pruebas automáticas y procesos de aseguramiento de calidad para reducir errores, optimizar tiempos y garantizar productos robustos y confiables.',
        'icon' => 'bi-check-circle'
    ],
    [
        'title' => 'Transformación Digital Ágil',
        'description' => 'Acompañamos a las organizaciones en la adopción de metodologías ágiles y herramientas digitales para mejorar la eficiencia, la adaptabilidad y la innovación en sus procesos.',
        'icon' => 'bi-lightning-charge'
    ],
    [
        'title' => 'Data & Business Analytics',
        'description' => 'Brindamos servicios de análisis de datos, visualización y business intelligence para que tomes decisiones estratégicas basadas en información precisa y actualizada.',
        'icon' => 'bi-graph-up'
    ]
];

$currentPage = isset($_GET['project_page']) ? (int)$_GET['project_page'] : 1;

?>

<div class="container-fluid p-0">
    <div class="overflow-hidden d-flex align-items-center justify-content-center" style="height: 50vh;">
        <img src="assets/img/banner.png" alt="Equipo de desarrollo tecnológico PixelPartners">
    </div>
    
    <section class="py-5 gradient-to-bottom">
        <div class="container">
            <h2 class="text-center mb-5 title">¿Qué ofrecemos?</h2>
            <div class="row g-4">
                <?php foreach ($services as $service): ?>
                    <div class="col-md-6 col-lg-4">
                        <div class="card h-100 border-0 shadow-sm hover-shadow transition-all">
                            <div class="card-body p-4">
                                <div class="icon-wrapper mb-3">
                                    <i class="bi <?= $service['icon'] ?> fs-1 text-secondary"></i>
                                </div>
                                <h3 class="h5 fw-bold mb-3"><?= $service['title'] ?></h3>
                                <p class="text-muted mb-0"><?= $service['description'] ?></p>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?> 
            </div>
        </div> 
    </section>
    <section id="projects" class="py-5">
        <div class="container">
            <h2 class="text-center mb-5 title">Proyectos Destacados</h2>
            <div class="row g-4">
                <?php 
                require_once "class/db/mysqli.php";
                require_once "process/get-projects-page.php";

                $projects = getProjectsPage($connection, $currentPage);

                if ($projects): 
                    foreach ($projects['results'] as $project): 
                ?>
                    <div class="col-md-6 col-lg-4">
                        <div class="card h-100 border-0 shadow-sm">
                            <div class="ratio ratio-16x9 bg-light d-flex align-items-center justify-content-center overflow-hidden">
                                <img src="<?= htmlspecialchars($project->image) ?>" class="img-fluid object-fit-cover w-100 h-100" alt="<?= htmlspecialchars($project->name) ?>" loading="lazy">
                            </div>
                            <div class="card-body d-flex flex-column">
                                <div class="d-flex justify-content-between align-items-center mb-3">
                                    <h3 class="h5 fw-bold">
                                        <span class="text-secondary fs-4">
                                            ★
                                        </span>
                                        <?= htmlspecialchars($project->name) ?>
                                    </h3>
                                    <?php if ($project->company_logo): ?>
                                        <div class="rounded-circle" style="width: 40px; height: 40px; background: #f8f9fa; display: flex; align-items: center; justify-content: center; overflow: hidden;">
                                            <img src="<?= htmlspecialchars($project->company_logo) ?>" 
                                                 style="width: 60px; height: 60px; object-fit: contain;"
                                                 alt="Logo de la empresa">
                                        </div>
                                    <?php endif; ?>
                                </div>
                                <p class="text-muted flex-grow-1">
                                    <?= htmlspecialchars($project->description) ?>
                                </p>
                                <h4 class="h6 fw-bold mb-3">
                                    <span class="text-primary fs-6">
                                        ★
                                    </span>
                                    Desarrolladores
                                </h4>
                                <ul class="p-0">
                                    <?php

                                    if($project->developers): 
                                        foreach ($project->developers as $developer): ?>
                                            <li class="d-flex align-items-center my-2">
                                                <img src="<?= htmlspecialchars($developer->image) ?>" alt="<?= htmlspecialchars($developer->name) ?>" class="rounded-circle" width="30" height="30">
                                                <div class="ms-2">
                                                    <span class="fw-semibold">
                                                        <?= htmlspecialchars($developer->name) ?> -
                                                    </span>
                                                    <span class="text-bg-light text-muted rounded"> 
                                                        <?= htmlspecialchars($developer->rol) ?>
                                                    </span>
                                                </div>
                                            </li>
                                        <?php endforeach; ?>
                                    <?php else: ?>
                                        <li>No han sido definidos los desarrolladores</li>
                                    <?php endif; ?>
                                </ul>
                             
                                <?php if($project->link): ?> 
                                    <a href="<?= htmlspecialchars($project->link) ?>" class="btn btn-primary align-self-start" target="_blank">
                                        Ver Proyecto <i class="bi bi-arrow-right ms-2"></i> 
                                    </a>
                                <?php else: ?>
                                    <a class="btn btn-primary align-self-start disabled">Vista no disponible</a>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                <?php 
                    endforeach; 
                ?>
               
                <ul class="pagination justify-content-center">
                    <li class="page-item <?php if(!$projects['has_prev']): ?>disabled<?php endif; ?>">
                        <a href="?project_page=<?= max(1, $currentPage - 1) ?>#projects" class="page-link" aria-label="Anterior">
                            <span aria-hidden="true">&larr;</span>
                        </a>
                    </li>
                    <li class="page-item active" aria-current="page">
                        <span class="page-link"><?= $currentPage ?></span>
                    </li>
                    <li class="page-item <?php if(!$projects['has_next']): ?>disabled<?php endif; ?>">
                        <a href="?project_page=<?= $currentPage + 1 ?>#projects" class="page-link" aria-label="Siguiente">
                            <span aria-hidden="true">&rarr;</span>
                        </a>
                    </li>
                </ul>
                <?php
                else:
                    echo '<p class="text-center w-100">No hay proyectos para mostrar</p>';
                endif; 
                ?>
            </div>
        </div>
    </section>

    <section class="py-5 bg-light">
        <div class="container">
            <h2 class="text-center mb-5 title">Empresas que confiaron en nosotros</h2>
            <div class="row row-cols-2 row-cols-sm-3 row-cols-md-4 row-cols-lg-5 row-cols-xl-6 g-4 justify-content-center">
                <?php
                require_once 'class/Company.php';
                require_once 'class/db/mysqli.php';

                $company = new Company();
                $companies = $company->findAll($connection);
                
                if ($companies): 
                    foreach ($companies as $company): 
                ?>
                    <div class="col">
                        <div class="card h-100 border-0 shadow-sm bg-white rounded-3 p-3 text-center transition-all">
                            <div class="d-flex align-items-center justify-content-center mb-3" style="height: 100px;">
                                <img src="<?= htmlspecialchars($company->logo) ?>" 
                                     class="img-fluid object-fit-contain w-100 h-100" 
                                     alt="<?= htmlspecialchars($company->name) ?> logo" 
                                     loading="lazy">
                            </div>
                            <h3 class="h6 text-dark fw-medium mb-0">
                                <?= htmlspecialchars($company->name) ?>
                            </h3>
                        </div>
                    </div>
                <?php 
                    endforeach; 
                else:
                    echo '<p class="text-center w-100">No hay empresas para mostrar</p>';
                endif; 
                ?>
            </div>
        </div>
    </section>
</div>