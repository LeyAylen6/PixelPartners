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
    <div class="home-hero-image">
        <img src="assets/img/banner.png" class="img-fluid w-100" alt="Equipo de desarrollo tecnológico PixelPartners" loading="lazy">
    </div>
    
    <section class="py-5 services-gradient-bg">
        <div class="container">
            <h2 class="text-center mb-5 section-title">¿Qué ofrecemos?</h2>
            <div class="row g-4">
                <?php foreach ($services as $service): ?>
                    <div class="col-md-6 col-lg-4">
                        <div class="card h-100 border-0 shadow-sm hover-shadow transition-all">
                            <div class="card-body p-4">
                                <div class="icon-wrapper mb-3">
                                    <i class="bi <?= $service['icon'] ?> fs-1 text-primary"></i>
                                </div>
                                <h3 class="h5 fw-bold mb-3"><?= htmlspecialchars($service['title']) ?></h3>
                                <p class="text-muted mb-0"><?= htmlspecialchars($service['description']) ?></p>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>
    <section class="py-5">
        <div class="container">
            <h2 class="text-center mb-5 section-title">Proyectos Destacados</h2>
            <div class="row g-4">
                <?php 
                require_once "class/db/mysqli.php";
                require_once "process/get-projects-page.php";

                $projects = getProjectsPage($connection, $currentPage);

                if ($projects): 
                    foreach ($projects as $project): 
                ?>
                    <div class="col-md-6 col-lg-4">
                        <div class="card h-100 border-0 shadow-sm project-card">
                            <img src="<?= htmlspecialchars($project->image) ?>" class="card-img-top project-image" alt="<?= htmlspecialchars($project->name) ?>" loading="lazy">
                            <div class="card-body d-flex flex-column">
                                <h3 class="h5 fw-bold mb-3">
                                    <?= htmlspecialchars($project->name) ?>
                                </h3>
                                <p class="text-muted flex-grow-1">
                                    <?= htmlspecialchars($project->description) ?>
                                </p>
                                <h4 class="h6 fw-bold mb-3">Desarrolladores</h4>
                                <ul>
                                    <?php

                                    if($project->developers): 
                                        foreach ($project->developers as $developer): ?>
                                            <li class="d-flex align-items-center">
                                                <img src="<?= htmlspecialchars($developer->image) ?>" alt="<?= htmlspecialchars($developer->name) ?>" class="rounded-circle" width="50" height="50">
                                                <span class="ms-2">
                                                    <?= htmlspecialchars($developer->name) . " (" . htmlspecialchars($developer->rol) . ")" ?>
                                                </span>
                                            </li>
                                        <?php endforeach; ?>
                                    <?php else: ?>
                                        <li>No han sido definidos los desarrolladores</li>
                                    <?php endif; ?>
                                </ul>
                                <a href="<?= htmlspecialchars($project->link) ?>" class="btn btn-primary align-self-start" target="_blank">
                                    Ver Proyecto <i class="bi bi-arrow-right ms-2"></i>
                                </a>
                            </div>
                        </div>
                        
                    </div>
                <?php 
                    endforeach; 
                ?>
                <div class="pagination-container" style="display: flex; justify-content: center; gap: 10px; margin-top: 20px;">
                    <a href="?project_page=<?= max(1, $currentPage - 1) ?>" class="pagination-arrow" style="display: inline-flex; align-items: center; justify-content: center; width: 40px; height: 40px; border: 1px solid #ddd; border-radius: 4px; text-decoration: none; color: #333; background: #f8f9fa;" onmouseover="this.style.background='#e9ecef'" onmouseout="this.style.background='#f8f9fa'">
                        &larr;
                    </a>
                    <span class="current-page" style="display: inline-flex; align-items: center; justify-content: center; width: 40px; height: 40px; border: 1px solid #0d6efd; border-radius: 4px; background: #0d6efd; color: white; font-weight: bold;">
                        <?= $currentPage ?>
                    </span>
                    <a href="?project_page=<?= $currentPage + 1 ?>" class="pagination-arrow" style="display: inline-flex; align-items: center; justify-content: center; width: 40px; height: 40px; border: 1px solid #ddd; border-radius: 4px; text-decoration: none; color: #333; background: #f8f9fa;" onmouseover="this.style.background='#e9ecef'" onmouseout="this.style.background='#f8f9fa'">
                        &rarr;
                    </a>
                </div>
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
            <h2 class="text-center mb-5 section-title">Empresas que confiaron en nosotros</h2>
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
                                     class="img-fluid mw-100 mh-100" 
                                     alt="<?= htmlspecialchars($company->name) ?> logo" 
                                     style="object-fit: contain;"
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