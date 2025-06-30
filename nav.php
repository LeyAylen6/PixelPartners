<?php
$navItems = [
  [
    'url' => 'home',
    'text' => 'Inicio'
  ],
  [
    'url' => 'about',
    'text' => 'Sobre Nosotros'
  ],
  [
    'url' => 'request-our-services',
    'text' => 'Solicita nuestros servicios'
  ],
  [
    'url' => 'admin-projects',
    'text' => 'Soy Admin'
  ]
];
?>

<nav class="shadow gradient-to-right-violet py-4">
  <div class="w-100 d-flex justify-content-evenly align-items-center">
    <h1 class="display-4 fs-1 text-white letter-spacing-1">PixelPartners</h1>
    <ul class="list-unstyled">
      <?php foreach ($navItems as $item): ?>
        <li class="d-inline">
          <a class="btn btn-primary nav-item py-3 px-4 mx-4" href="<?= "index.php?page=" . htmlspecialchars($item['url']) ?>">
            <?= htmlspecialchars($item['text']) ?>
          </a>
        </li>
      <?php endforeach; ?>
    </ul>
  </div>
</nav>

