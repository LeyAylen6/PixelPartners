<?php
require_once "class/User.php";
require_once "class/db/mysqli.php";

$user = new User();
$team = $user->findAll($connection);

$values = [
  'Innovación constante',
  'Compromiso con la accesibilidad',
  'Soluciones personalizadas',
  'Enfoque en la experiencia del usuario'
];
?>

<section class="about">
  <div class="about-flex-header">
    <article class="about-header">
      <h2> <span class="brand">Sobre</span> PixelPartners</h2>
      <p class="about-description">Creemos en la tecnología como motor de transformación, acompañando a cada cliente desde la idea hasta el lanzamiento y el crecimiento sostenido. Nuestro equipo combina experiencia técnica, creatividad y pasión por los detalles para construir soluciones que inspiran y generan impacto real.</p>
      <p class="about-description">Trabajamos con metodologías ágiles, priorizando la comunicación, la transparencia y la excelencia en cada etapa del proyecto.</p>
    </article>
    <article class="about-values">
      <h2><span class="brand">Nuestros Valores</span></h2>
      <ul class="values-list">
        <?php foreach($values as $value): ?>
          <li><?= $value ?></li>
        <?php endforeach; ?>
      </ul>
    </article>
  </div>
  <article class="about-team">
    <h2 class="section-title">Nuestro Equipo</h2>
    <div class="team-list">
      <?php foreach($team as $user): ?>
      <article class="team-member">
        <img src="<?= $user->image ?>" alt="<?= $user->name ?>" class="team-photo" loading="lazy">
        <div class="team-info">
          <h3><?= $user->name ?></h3>
          <p><?= $user->rol ?></p>
        </div>
      </article>
      <?php endforeach; ?>
    </div>
  </article>
</section>