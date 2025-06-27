<?php

$services = [
    [
        'title' => 'Squads Especializados',
        'description' => 'Formamos equipos multidisciplinarios, adaptados a cada proyecto, que colaboran de manera ágil y transparente para lograr resultados sobresalientes y alineados con tus objetivos.'
    ],
    [
        'title' => 'Staff IT Flexible',
        'description' => 'Sumamos desarrolladores y especialistas a tus equipos, ya sea para cubrir picos de demanda, proyectos puntuales o reforzar capacidades técnicas en el corto, mediano o largo plazo.'
    ],
    [
        'title' => 'Desarrollo de Software Personalizado',
        'description' => 'Diseñamos, desarrollamos y mantenemos soluciones tecnológicas a medida, desde la planificación hasta la puesta en producción, asegurando calidad y cumplimiento de objetivos.'
    ],
    [
        'title' => 'Automatización y QA',
        'description' => 'Implementamos pruebas automáticas y procesos de aseguramiento de calidad para reducir errores, optimizar tiempos y garantizar productos robustos y confiables.'
    ],
    [
        'title' => 'Transformación Digital Ágil',
        'description' => 'Acompañamos a las organizaciones en la adopción de metodologías ágiles y herramientas digitales para mejorar la eficiencia, la adaptabilidad y la innovación en sus procesos.'
    ],
    [
        'title' => 'Data & Business Analytics',
        'description' => 'Brindamos servicios de análisis de datos, visualización y business intelligence para que tomes decisiones estratégicas basadas en información precisa y actualizada.'
    ]
];

?>

<section class="listing">
    <article class="home-hero-image">
        <img src="assets/img/banner.png" alt="Equipo de desarrollo tecnológico PixelPartners" loading="lazy">
    </article>
    
    <article class="company-services">
        <h2 class="services-title">¿Qué ofrecemos?</h2>
        <div class="services-list">
            <?php
            foreach ($services as $service): ?>
                <article class="service">
                    <h3><?= htmlspecialchars($service['title']) ?></h3>
                    <p><?= htmlspecialchars($service['description']) ?></p>
                </article>
            <?php endforeach; ?>
        </div>
    </article>
    <article class="projects">
        <h2>Proyectos Destacados</h2>
        <div class="projects-list">
        <?php 
            require_once "class/db/mysqli.php";
            require_once "class/Project.php";

            $project = new Project();
            $projects = $project->findAll($connection);
        ?>
        <?php if ($projects == false): ?>
            <?php foreach ($projects as $project): ?>
                <article class="project-item">
                    <img src="<?= htmlspecialchars($project->image) ?>" alt="<?= htmlspecialchars($project->name) ?>" class="project-photo" loading="lazy">
                    <div class="project-info">
                        <h3><?= htmlspecialchars($project->name) ?></h3>
                        <p class="project-description"><?= htmlspecialchars($project->description) ?></p>
                        <p class="project-developer"><strong>Desarrollador:</strong> <?= htmlspecialchars($project->developer) ?></p>
                        <a class="project-link" href="<?= htmlspecialchars($project->link) ?>" target="_blank">Ver Proyecto</a>
                    </div>
                </article>
            <?php endforeach; ?>
        <?php else:
            include_once __DIR__ . "/404.php";
            exit;
        endif; ?>
        </div>
    </article>

    <article class="trusted-companies">
      <h2 class="section-title">Empresas que confiaron en nosotros</h2>
      <div class="companies-grid">
        <?php
          require_once 'class/Company.php';
          $company = new Company();
          $companies = $company->findAll($connection);
        ?>
        <?php if ($companies): ?>
          <?php foreach ($companies as $company): ?>
            <article class="company-card">
              <figure class="company-logo">
                <img src="<?= htmlspecialchars($company->logo) ?>" alt="<?= htmlspecialchars($company->name) ?> logo" loading="lazy">
              </figure>
              <h3 class="company-name"><?= htmlspecialchars($company->name) ?></h3>
            </article>
          <?php endforeach; ?>
        <?php else:
            header('Location: ' . __DIR__ . '/404.php');
            exit;
        endif; ?>
      </div>
    </article>
</section>
