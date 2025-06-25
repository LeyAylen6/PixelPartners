<section class="listado">
    <article class="home-hero-image">
        <img src="assets/img/banner.png" alt="Equipo de desarrollo tecnológico PixelPartners" loading="lazy">
    </article>
    
    <article class="servicios-empresa">
        <h2 class="servicios-titulo">¿Qué ofrecemos?</h2>
        <div class="servicios-lista">
            <article class="servicio">
                <h3>Squads Especializados</h3>
                <p>Formamos equipos multidisciplinarios, adaptados a cada proyecto, que colaboran de manera ágil y transparente para lograr resultados sobresalientes y alineados con tus objetivos.</p>
            </article>
            <article class="servicio">
                <h3>Staff IT Flexible</h3>
                <p>Sumamos desarrolladores y especialistas a tus equipos, ya sea para cubrir picos de demanda, proyectos puntuales o reforzar capacidades técnicas en el corto, mediano o largo plazo.</p>
            </article>
            <article class="servicio">
                <h3>Desarrollo de Software Personalizado</h3>
                <p>Diseñamos, desarrollamos y mantenemos soluciones tecnológicas a medida, desde la planificación hasta la puesta en producción, asegurando calidad y cumplimiento de objetivos.</p>
            </article>
            <article class="servicio">
                <h3>Automatización y QA</h3>
                <p>Implementamos pruebas automáticas y procesos de aseguramiento de calidad para reducir errores, optimizar tiempos y garantizar productos robustos y confiables.</p>
            </article>
            <article class="servicio">
                <h3>Transformación Digital Ágil</h3>
                <p>Acompañamos a las organizaciones en la adopción de metodologías ágiles y herramientas digitales para mejorar la eficiencia, la adaptabilidad y la innovación en sus procesos.</p>
            </article>
            <article class="servicio">
                <h3>Data & Business Analytics</h3>
                <p>Brindamos servicios de análisis de datos, visualización y business intelligence para que tomes decisiones estratégicas basadas en información precisa y actualizada.</p>
            </article>
        </div>
    </article>
    <article class="proyectos">
        <h2>Proyectos Destacados</h2>
        <div class="projects-list">
        <?php 
            require_once "class/db/mysqli.php";
            require_once "class/Project.php";

            $project = new Project();
            $projects = $project->findAll($connection);
        ?>
        <?php if ($projects): ?>
            <?php foreach ($projects as $project): ?>
                <article class="project-item">
                    <img src="<?= htmlspecialchars($project->image) ?>" alt="<?= htmlspecialchars($project->name) ?>" class="project-photo" loading="lazy">
                    <div class="project-info">
                        <h3><?= htmlspecialchars($project->name) ?></h3>
                        <p class="project-desc"><?= htmlspecialchars($project->description) ?></p>
                        <p class="project-dev"><strong>Desarrollador:</strong> <?= htmlspecialchars($project->developer) ?></p>
                        <a class="project-link-btn" href="<?= htmlspecialchars($project->link) ?>" target="_blank">Ver Proyecto</a>
                    </div>
                </article>
            <?php endforeach; ?>
        <?php else:
            header('Location: /views/error.php');
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
        <?php else: ?>
          <p class="no-companies">No hay empresas registradas aún.</p>
        <?php endif; ?>
      </div>
    </article>
</section>
