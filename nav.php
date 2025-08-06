<?php
require_once 'class/User.php';

$isLoggedIn = false;
$isAdmin = false;

if (isset($_SESSION['user']) && $_SESSION['user']['rol']) {
    $isLoggedIn = true;
    $isAdmin = $_SESSION['user']['rol'] === 'admin';
}

$navItems = [
    [
        'url' => 'index.php?page=home',
        'text' => 'Inicio',
        'visible' => true
    ],
    [
        'url' => 'index.php?page=about',
        'text' => 'Sobre Nosotros',
        'visible' => true
    ],
    [
        'url' => 'index.php?page=request-our-services',
        'text' => 'Solicita nuestros servicios',
        'visible' => true
    ],
    // Solo visible para usuarios logueados
    [
        'url' => 'index.php?page=profile-edit',
        'text' => 'Mi Perfil',
        'visible' => $isLoggedIn
    ],
    // Solo visible para administradores
    [
        'url' => 'index.php?page=admin-users',
        'text' => 'Administrar Usuarios',
        'visible' => $isLoggedIn && $isAdmin
    ],
    [
        'url' => 'index.php?page=admin-projects',
        'text' => 'Administrar Proyectos',
        'visible' => $isLoggedIn && $isAdmin
    ],
    // Solo visibles para usuarios NO logueados
    [
        'url' => 'index.php?page=login',
        'text' => 'Iniciar Sesión',
        'visible' => !$isLoggedIn
    ],
    [
        'url' => 'index.php?page=register',
        'text' => 'Registrarse',
        'visible' => !$isLoggedIn
    ],
    [
        'url' => 'process/logout.php',
        'text' => 'Cerrar Sesión',
        'visible' => $isLoggedIn
    ]
];
?>

<nav class="shadow gradient-to-right-violet py-4">
    <div class="w-100 d-flex justify-content-evenly align-items-center">
        <h1 class="display-4 fs-1 text-white letter-spacing-1">PixelPartners</h1>
        <ul class="list-unstyled">
        <?php foreach ($navItems as $item): ?>
            <?php if ($item['visible'] ?? true): ?>
            <li class="d-inline">
                <a class="btn btn-primary nav-item py-3 px-4 mx-4" href="<?= $item['url'] ?>">
                <?= htmlspecialchars($item['text']) ?>
                <?php if ($item['url'] === 'admin-users'): ?>
                    <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">Admin</span>
                <?php endif; ?>
                </a>
            </li>
            <?php endif; ?>
        <?php endforeach; ?>
        </ul>
    </div>
</nav>
