<?php
$equipo = [
  [
    'nombre' => 'Ignacio Gimenez',
    'foto' => 'https://randomuser.me/api/portraits/men/32.jpg', // Imagen de prueba externa
    'rol' => 'Especialista en APIs, diseño responsivo y front-end dinámico.'
  ],
  [
    'nombre' => 'Leila Salguero',
    'foto' => '/assets/img/leila.jpg', // Imagen real importada
    'rol' => 'Experta en e-commerce, UX/UI y tecnologías modernas de integración web.'
  ]
];

$proyectos = [
  [
    'nombre' => 'Tienda Online Nova',
    'descripcion' => 'E-commerce moderno con integración de pagos y diseño mobile-first.',
    'img' => 'https://images.unsplash.com/photo-1519389950473-47ba0277781c?w=400&h=300&fit=crop' // Imagen de prueba externa
  ],
  [
    'nombre' => 'Portal Educativo EduPlus',
    'descripcion' => 'Plataforma educativa interactiva y accesible.',
    'img' => '/assets/img/proyecto2.jpg' // Imagen real importada
  ],
  [
    'nombre' => 'Landing Page Creativa',
    'descripcion' => 'Sitio institucional con animaciones y optimización SEO.',
    'img' => '/assets/img/proyecto3.jpg' // Imagen real importada
  ]
];
?>

<section class="about">
  <div class="about-flex-header">
    <article class="about-header">
      <h2>Sobre <span class="brand">PixelPartners</span></h2>
      <p class="about-description">Creemos en la tecnología como motor de transformación, acompañando a cada cliente desde la idea hasta el lanzamiento y el crecimiento sostenido. Nuestro equipo combina experiencia técnica, creatividad y pasión por los detalles para construir soluciones que inspiran y generan impacto real.</p>
      <p class="about-description">Trabajamos con metodologías ágiles, priorizando la comunicación, la transparencia y la excelencia en cada etapa del proyecto.</p>
    </article>
    <article class="about-values">
      <h2>Nuestros Valores</h2>
      <ul class="values-list">
        <li>Innovación constante</li>
        <li>Compromiso con la accesibilidad</li>
        <li>Soluciones personalizadas</li>
        <li>Enfoque en la experiencia del usuario</li>
      </ul>
    </article>
  </div>
  <article class="about-team">
    <h2>Nuestro Equipo</h2>
    <div class="team-list">
      <?php foreach($equipo as $miembro): ?>
      <article class="team-member">
        <img src="<?= $miembro['foto'] ?>" alt="<?= $miembro['nombre'] ?>" class="team-photo" loading="lazy">
        <div class="team-info">
          <h3><?= $miembro['nombre'] ?></h3>
          <p><?= $miembro['rol'] ?></p>
        </div>
      </article>
      <?php endforeach; ?>
    </div>
  </article>
</section>