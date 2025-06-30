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

<section class="about bg-primary-light py-5">
  <div class="d-flex justify-content-around">
    <article class="bg-white col-5 rounded-5 p-4">
      <h2 class="fs-2 text-center mb-4"> 
        <strong class="text-primary">Sobre</strong> PixelPartners
      </h2>
      <p class="text-center mb-2 fs-5 text-muted">Creemos en la tecnología como motor de transformación, acompañando a cada cliente desde la idea hasta el lanzamiento y el crecimiento sostenido. Nuestro equipo combina experiencia técnica, creatividad y pasión por los detalles para construir soluciones que inspiran y generan impacto real.</p>
      <p class="text-center mb-2 fs-5 text-muted">Trabajamos con metodologías ágiles, priorizando la comunicación, la transparencia y la excelencia en cada etapa del proyecto.</p>
    </article>
    <article class="bg-white col-5 rounded-5 gradient-to-right p-4">
      <h2 class="fs-2 text-center mb-4 text-primary">Nuestros Valores</h2>
      <ul class="d-flex flex-column gap-3 list-unstyled justify-content-center align-items-center">
        <?php foreach($values as $value): ?>
          <li class="bg-white rounded-5 p-2 shadow px-4 d-flex align-items-center justify-content-center">
            <span class="text-primary fs-4">
              ★
            </span>
            <span class="fs-5 ps-2">
              <?= $value ?>
            </span>
          </li>
        <?php endforeach; ?>
      </ul>
    </article>
  </div>
  <article class="mt-5">
    <h2 class="title">Nuestro Equipo</h2>
    <ul class="d-flex flex-wrap justify-content-center gap-3">
      <?php foreach($team as $user): ?>
      <li class="bg-white rounded-5 p-2 shadow col-2 d-flex flex-column align-items-center">
        <img class="w-75" src="<?= $user->image ?>" alt="<?= $user->name ?>" class="team-photo" loading="lazy">
        <div class="pt-2">
          <h3 class="text-center fs-5">
            <?= $user->name ?>
          </h3>
          <p class="text-muted text-center">
            <?= $user->rol ?>
          </p>
        </div>
      </li>
      <?php endforeach; ?>
    </ul>
  </article>
</section>